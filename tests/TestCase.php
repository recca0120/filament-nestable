<?php

namespace Recca0120\FilamentNestable\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Infolists\InfolistsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\SpatieLaravelSettingsPluginServiceProvider;
use Filament\SpatieLaravelTranslatablePluginServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Filament\Widgets\WidgetsServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Schema;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Recca0120\FilamentNestable\FilamentNestableServiceProvider;
use Recca0120\FilamentNestable\Tests\Fixtures\FilamentNestablePanelProvider;
use RyanChandler\BladeCaptureDirective\BladeCaptureDirectiveServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Recca0120\\FilamentNestable\\Database\\Factories\\'.class_basename($modelName).'Factory';
        });
    }

    protected function getPackageProviders($app)
    {
        return [
            ActionsServiceProvider::class,
            BladeCaptureDirectiveServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            InfolistsServiceProvider::class,
            LivewireServiceProvider::class,
            NotificationsServiceProvider::class,
//            SpatieLaravelSettingsPluginServiceProvider::class,
//            SpatieLaravelTranslatablePluginServiceProvider::class,
            SupportServiceProvider::class,
            TablesServiceProvider::class,
            WidgetsServiceProvider::class,
            FilamentNestableServiceProvider::class,
            FilamentNestablePanelProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('app.key', 'base64:'.base64_encode(Encrypter::generateKey(config('config.app.cipher'))));
        config()->set('app.debug', true);

        $migration = new class extends Migration {
            public function up(): void
            {
                Schema::create('users', static function (Blueprint $table) {
                    $table->id();
                    $table->string('email');
                    $table->string('name');
                    $table->timestamps();
                });
            }
        };
        $migration->up();

        $migration = new class extends Migration {
            /**
             * Run the migrations.
             */
            public function up(): void
            {
                Schema::create('pages', static function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('parent_id')->nullable();
                    $table->string('name');
                    $table->unsignedInteger('_lft');
                    $table->unsignedInteger('_rgt');
                    $table->timestamps();
                });
            }

            /**
             * Reverse the migrations.
             */
            public function down(): void
            {
                Schema::dropIfExists('pages');
            }
        };
        $migration->up();
    }
}
