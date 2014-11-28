<?php
class ProductTableSeeder extends DatabaseSeeder
{
  public function run()
  {
    $faker = $this->getFaker();

    $categories = Category::all();

    foreach ($categories as $category)
    {
      for ($i = 0; $i < rand(-1, 10); $i++)
      {
        $name  = ucwords($faker->word);
        $stock = 1;
        $desc = $faker->text();
        $price = $faker->randomFloat(2, 5, 100);

        Product::create( [
            "category_id"  => $category->id,
            "title"        => $name,
            "description"  => $desc,
            "price"        => $price,
            "availability" => $stock
        ] );
      }
    }
  }
}