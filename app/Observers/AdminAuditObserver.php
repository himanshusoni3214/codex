<?php

namespace App\Observers;

use App\Models\AdminAudit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AdminAuditObserver
{
    public function created(Model $model): void
    {
        $this->log('created', $model);
    }

    public function updated(Model $model): void
    {
        $this->log('updated', $model, $model->getOriginal());
    }

    public function deleted(Model $model): void
    {
        $this->log('deleted', $model, $model->getOriginal());
    }

    protected function log(string $action, Model $model, ?array $before = null): void
    {
        $user = Auth::user();

        if (! $user || (! $user->is_admin && ! $user->hasAnyRole(['Super Admin', 'Manager']))) {
            return;
        }

        AdminAudit::create([
            'user_id' => $user->id,
            'action' => $action,
            'auditable_type' => $model::class,
            'auditable_id' => $model->getKey(),
            'before' => $before,
            'after' => $model->getAttributes(),
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
