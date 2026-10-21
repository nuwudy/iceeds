<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AtcRegistration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'reference_no',
        'centre_name',
        'director_name',
        'contact_number',
        'office_number',
        'email',
        'centre_address',
        'course_details',
        'director_address',
        'year_of_establishment',
        'director_photo_path',
        'director_photo_original_name',
        'declaration_accepted',
        'status',
        'admin_notes',
        'ip_address',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'declaration_accepted' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to search ATC applications.
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (empty($term)) {
            return $query;
        }

        $term = trim($term);

        return $query->where(function (Builder $q) use ($term) {
            $q->where('reference_no', 'like', "%{$term}%")
              ->orWhere('centre_name', 'like', "%{$term}%")
              ->orWhere('director_name', 'like', "%{$term}%")
              ->orWhere('email', 'like', "%{$term}%")
              ->orWhere('contact_number', 'like', "%{$term}%")
              ->orWhere('office_number', 'like', "%{$term}%")
              ->orWhere('course_details', 'like', "%{$term}%");
        });
    }

    /**
     * Scope by status.
     */
    public function scopeStatus(Builder $query, ?string $status): Builder
    {
        if (empty($status) || $status === 'all') {
            return $query;
        }

        return $query->where('status', $status);
    }

    /**
     * Get URL for the uploaded director's photo/file.
     */
    public function getPhotoUrlAttribute(): ?string
    {
        if (!$this->director_photo_path) {
            return null;
        }

        return route('atc.file', ['registration' => $this->id]);
    }

    /**
     * Check if uploaded file is an image.
     */
    public function getIsImageAttribute(): bool
    {
        if (!$this->director_photo_path) {
            return false;
        }

        $ext = strtolower(pathinfo($this->director_photo_path, PATHINFO_EXTENSION));
        return in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif']);
    }

    /**
     * Get human-readable status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'under_review' => 'Under Review',
            default => 'Pending Review',
        };
    }
}
