<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class MediaFile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'file_name',
        'file_path',
        'disk',
        'file_type',
        'mime_type',
        'file_size',
        'extension',
        'alt_text',
        'description',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var list<string>
     */
    protected $appends = [
        'url',
        'formatted_size',
    ];

    /**
     * Get the public URL for the media asset.
     */
    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk ?? 'public')->url($this->file_path);
    }

    /**
     * Get human-readable file size.
     */
    public function getFormattedSizeAttribute(): string
    {
        $bytes = (int) $this->file_size;

        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        }

        if ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        }

        if ($bytes >= 1024) {
            return number_format($bytes / 1024, 1) . ' KB';
        }

        return $bytes . ' B';
    }

    /**
     * Scope query to filter by type.
     */
    public function scopeOfType(Builder $query, ?string $type): Builder
    {
        if (!$type || $type === 'all') {
            return $query;
        }

        return $query->where('file_type', $type);
    }

    /**
     * Scope query to search by term.
     */
    public function scopeSearch(Builder $query, ?string $search): Builder
    {
        if (!$search) {
            return $query;
        }

        $term = '%' . strtolower(trim($search)) . '%';

        return $query->where(function ($q) use ($term) {
            $q->whereRaw('LOWER(title) LIKE ?', [$term])
              ->orWhereRaw('LOWER(file_name) LIKE ?', [$term])
              ->orWhereRaw('LOWER(alt_text) LIKE ?', [$term]);
        });
    }

    /**
     * Delete file from storage upon deletion.
     */
    protected static function booted(): void
    {
        static::deleting(function (MediaFile $media) {
            if ($media->file_path && Storage::disk($media->disk ?? 'public')->exists($media->file_path)) {
                Storage::disk($media->disk ?? 'public')->delete($media->file_path);
            }
        });
    }
}
