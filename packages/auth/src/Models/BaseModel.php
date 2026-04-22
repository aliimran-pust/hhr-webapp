<?php

namespace AI\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Get the item create time.
     *
     * @param  timestamp  $value
     * @return date
     */
    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime("$value"));
    }

    /**
     * Get the item update time.
     *
     * @param  timestamp  $value
     * @return date
     */
    public function getUpdatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime("$value"));
    }

    /**
     * Show createdt at
     *
     * @return null|date
     */
    public function createdAt()
    {
        if ($this->created_at == '1970-01-01') {
            return '';
        }

        return date('Y-m-d', strtotime($this->created_at));
    }

    /**
     * Show updated at
     *
     * @return null|date
     */
    public function updatedAt()
    {
        if ($this->updated_at == '1970-01-01') {
            return '';
        }

        return date('Y-m-d', strtotime($this->updated_at));
    }
}
