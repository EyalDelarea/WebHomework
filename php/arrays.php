<?php

class item
{
    public static $id = 0;
    public $picture;
    public $name;
    public $price;
    public $description;

    /**
     * item constructor.
     * @param $picture
     * @param $name
     * @param $price
     * @param $description
     */
    function __construct($picture, $name, $price, $description)
    {

        $this->picture = $picture;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        item::$id++;

    }
}

?>

<?php

$navItems = array(
    /**
     * nab bar items
     * and id links to jump inside the page
     */
    array(
        "scriptName" => "Home",
        "title" => "Home"
    ),

    array(
        "scriptName" => "about",
        "title" => "About"
    ),
    array(
        "scriptName" => "ContactTag",
        "title" => "Contact"
    ),

);

?>
