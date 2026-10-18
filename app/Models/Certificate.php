<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id',
        'student_name',
        'first_name',
        'last_name',
        'course',
        'issue_date',
        'certificate_code',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'issue_date' => 'date',
        ];
    }

    /**
     * Generate an authenticity hash for the certificate.
     */
    public function getAuthenticityHashAttribute(): string
    {
        return hash('sha256', "ICEEDS:{$this->certificate_code}:{$this->student_name}:{$this->issue_date?->format('Y-m-d')}");
    }
}
