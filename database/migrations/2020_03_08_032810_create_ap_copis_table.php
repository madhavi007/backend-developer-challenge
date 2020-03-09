<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApCopisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ap_copis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('state_id')->unsigned();
            $table->string('state')->nullable();
            $table->string('code')->nullable();
            $table->string('quarter')->nullable();
            $table->bigInteger('year')->nullable();
            $table->string('city')->nullable();
            $table->string('steak')->nullable();
            $table->string('grnd_beef')->nullable();
            $table->string('sausage')->nullable();
            $table->string('fry_chick')->nullable();
            $table->string('tuna')->nullable();
            $table->string('hgal_milk')->nullable();
            $table->string('dozen_eggs')->nullable();
            $table->string('margarine')->nullable();
            $table->string('parmesan')->nullable();
            $table->string('potatoes')->nullable();
            // $table->string('bananas')->nullable();
            // $table->string('lettuce')->nullable();
            // $table->string('bread')->nullable();
            // $table->string('orange_juice')->nullable();
            // $table->string('coffee')->nullable();
            // $table->string('sugar')->nullable();
            // $table->string('cereal')->nullable();
            // $table->string('sweet_peas')->nullable();
            // $table->string('peaches')->nullable();
            // $table->string('klnx')->nullable();
            // $table->string('cascade')->nullable();
            // $table->string('cooking_oil')->nullable();
            // $table->string('frozn_meal')->nullable();
            // $table->string('frozn_corn')->nullable();
            // $table->string('potato_chips')->nullable();
            // $table->string('coke')->nullable();
            // $table->string('apt_rent')->nullable();
            // $table->string('home_price')->nullable();
            // $table->string('mort_rate')->nullable();
            // $table->string('home_pi')->nullable();
            // $table->string('all_elect')->nullable();
            // $table->string('part_elect')->nullable();
            // $table->string('other_energy')->nullable();
            // $table->string('total_energy')->nullable();
            // $table->string('phone')->nullable();
            // $table->string('tire_bal')->nullable();
            // $table->string('gasoline')->nullable();
            // $table->string('optometrist')->nullable();
            // $table->string('doctor')->nullable();
            // $table->string('dentist')->nullable();
            // $table->string('ibuprofen')->nullable();
            // $table->string('prescription_drug')->nullable();
            // $table->string('hmbgr_sand')->nullable();
            // $table->string('pizza')->nullable();
            // $table->string('2_pc_chick')->nullable();
            // $table->string('hair_cut')->nullable();
            // $table->string('beaut_salon')->nullable();
            // $table->string('toothpaste')->nullable();
            // $table->string('shampoo')->nullable();
            // $table->string('dry_clean')->nullable();
            // $table->string('mens_shirt')->nullable();
            // $table->string('boys_jeans')->nullable();
            // $table->string('womens_slacks')->nullable();
            // $table->string('washr_repr')->nullable();
            // $table->string('newspaper')->nullable();
            // $table->string('movie')->nullable();
            // $table->string('yoga')->nullable();
            // $table->string('tenns_balls')->nullable();
            // $table->string('vet_services')->nullable();
            // $table->string('beer')->nullable();
            // $table->string('wine')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
        Schema::table('ap_copis', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('ap_states')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ap_copis');
    }
}
