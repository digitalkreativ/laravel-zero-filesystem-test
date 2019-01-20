<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppBuiltServiceProvider extends ServiceProvider
{

    const CONFIG_KEY  = 'app-built';

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if( $this->canReplace('filesystems') ){
            $this->replaceFileSystems();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $config = $this->app->make('config');

        if ($config->get( self::CONFIG_KEY ) === null) {
            $config->set( self::CONFIG_KEY , $this->getDefaultConfig());
        }
    }

    /**
     * Replace keys inside the filesystems config
     *
     * @return void
     */
    protected function replaceFileSystems()
    {
        $currentFileSystems = Config::get('filesystems');

        if( isset( $currentFileSystems['disks'] ) && count( $currentFileSystems['disks'] ) > 0 ){

            if( $this->canReplace('filesystems.drivers') ){

                foreach( $this->get('filesystems.drivers') as $driver => $replace ){

                    foreach( $replace as $key => $replacements ){

                        $old = array_shift( $replacements );
                        $new = array_shift( $replacements );

                        if( !empty( $old ) && !empty( $new ) ){
                            foreach( $currentFileSystems['disks'] as $diskName => $diskConfig ){
                                if( $diskConfig['driver'] === $driver && Str::startsWith( $diskConfig[ $key ], $old ) ){
                                    $diskConfig[ $key ] = str_replace( $old, $new, $diskConfig[ $key ] );
                                    Config::set('filesystems.disks.' . $diskName, $diskConfig );
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * Verify if we can replace settings when app is in production
     *
     * @param null $what
     * @return bool
     */
    protected function canReplace( $what=null )
    {
        $canReplace = true;
        if( !is_null( $what ) ){
            if( is_null( config( self::CONFIG_KEY . '.' . $what ) ) ){
                $canReplace = false;
            }
        }

        return config('app.production') === true && $canReplace;
    }

    /**
     * @param null $what
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    protected function get( $what=null )
    {
        if( is_null( $what ) ){
            return config( self::CONFIG_KEY );
        }

        return config( self::CONFIG_KEY . '.' . $what );
    }


    /**
     * Returns the default application build config.
     */
    protected function getDefaultConfig(): array
    {
        return [
            'filesystems' => [
                'drivers' => [
                    'local' => [
                        'root' => [
                            $this->app->storagePath(),
                            rtrim( getcwd(), DIRECTORY_SEPARATOR ) . DIRECTORY_SEPARATOR . 'storage',
                        ],
                    ],
                ],
            ],
        ];
    }
}
