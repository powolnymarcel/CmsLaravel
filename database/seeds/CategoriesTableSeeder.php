<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorie = new \App\Categories();
        $categorie->nom='mode';
        $categorie->save();

        $categorie = new \App\Categories();
        $categorie->nom='Sport';
        $categorie->save();

        $categorie = new \App\Categories();
        $categorie->nom='Nourriture';
        $categorie->save();
    }
}
