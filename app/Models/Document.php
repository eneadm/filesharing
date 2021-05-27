<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;
    use Uuid;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $guarded = [];

    public function isImage(): bool
    {
        return in_array($this->extension, ['jpeg', 'jpg', 'bmp', 'png']);
    }

    public function isPdf(): bool
    {
        return $this->extension === 'pdf';
    }

    public function isWord(): bool
    {
        return in_array($this->extension, ['doc', 'docx']);
    }

    public function isExcel(): bool
    {
        return in_array($this->extension, ['xls', 'xlsx']);
    }

    public function isZip(): bool
    {
        return $this->extension === 'zip';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
