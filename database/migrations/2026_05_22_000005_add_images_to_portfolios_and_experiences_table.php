<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->json('images')->nullable()->after('image');
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->json('images')->nullable()->after('image');
        });

        foreach (DB::table('portfolios')->whereNotNull('image')->get() as $portfolio) {
            DB::table('portfolios')
                ->where('id', $portfolio->id)
                ->update(['images' => json_encode([$portfolio->image])]);
        }

        foreach (DB::table('experiences')->whereNotNull('image')->get() as $experience) {
            DB::table('experiences')
                ->where('id', $experience->id)
                ->update(['images' => json_encode([$experience->image])]);
        }
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('images');
        });

        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn('images');
        });
    }
};
