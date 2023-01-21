<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PostStatusEnum;
use http\Exception\RuntimeException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'status' => PostStatusEnum::class,
    ];

    /**
     * @return HasMany<Like>
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * @return HasMany<Comment>
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @param Builder<static> $query
     * @param string|null $sortBy
     * @param string|null $direction
     * @return void
     */
    public function scopeFilters(
        Builder $query,
        ?string $sortBy,
        ?string $direction,
    ): void {
        $query->when(
            value: $sortBy,
            callback: static function (Builder $query, $sortBy) use ($direction): void {
                match ($sortBy) {
                    'title' => $query->orderBy('title', $direction ?? 'DESC'),
                    'status' => $query->orderByStatus($direction),
                    'analysis' => $query->orderByLikesAndCommentsCount($direction),
                    default => throw new RuntimeException('SortBy parameter in missing.'),
                };
            }
        );
    }

    /**
     * @param Builder<static> $query
     * @param string|null $direction
     * @return void
     */
    public function scopeOrderByStatus(
        Builder $query,
        ?string $direction,
    ): void {
        $query->orderBy(
            column: DB::raw(
                value: "case
                            when status = 'draft' then 1
                            when status = 'validated' then 2
                            when status = 'online' then 3
                        end",
            ),
            direction: $direction ?? 'DESC',
        );
    }

    /**
     * @param Builder<static> $query
     * @param string|null $direction
     * @return void
     */
    public function scopeOrderByLikesAndCommentsCount(
        Builder $query,
        ?string $direction,
    ): void {
        $query->orderBy(
            column: DB::raw(
                value: "(likes_count + (comments_count * 5))",
            ),
            direction: $direction ?? 'DESC',
        );
    }
}
