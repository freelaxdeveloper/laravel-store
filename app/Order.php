<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Agent;
use App\UserDevice;

class Order extends Model
{
    protected $fillable = ['user_id', 'products', 'price', 'comment'];

    protected $casts = [
        'products' => 'array',
    ];


    public function products()
    {
        return collect($this->products);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // записываем данные устройства, с которого был сделан заказ
            $agent = new Agent;

            $device = UserDevice::create([
                'user_id' => $model->user_id,
                'browser' => $agent->browser(),
                'platform' => $agent->platform(),
                'device' => $agent->device(),
                'ip' => $_SERVER['REMOTE_ADDR'],
                'info' => [
                    'browser_version' => $agent->version($agent->browser()),
                    'platform_version' => $agent->version($agent->platform()),
                    'is_Desktop' => $agent->isDesktop(),
                    'is_Windows' => $agent->is('Windows'),
                    'is_Linux' => $agent->is('Linux'),
                    'is_Firefox' => $agent->is('Firefox'),
                    'is_Opera' => $agent->is('Opera'),
                    'is_Chrome' => $agent->is('Chrome'),
                    'is_iPhone' => $agent->is('iPhone'),
                    'is_OS_X' => $agent->is('OS X'),
                    'is_Mobile' => $agent->isMobile(),
                    'is_Tablet' => $agent->isTablet(),
                    'isAndroidOS' => $agent->isAndroidOS(),
                    'isNexus' => $agent->isNexus(),
                    'isSafari' => $agent->isSafari(),
                ],
            ]);
            $model->device_id = $device->id;

        });
    }

}
