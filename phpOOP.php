<?php 
/*
Apa itu Object?
Object adalah data yang berisi field / properties / attributes dan method / function / behavior

Apa itu Class?
Class adalah blueprint, prototype atau cetakan untuk membuat Object
Class berisikan deklarasi semua properties dan functions yang dimiliki oleh Object
Setiap Object selalu dibuat dari Class
Dan sebuah Class bisa membuat Object tanpa batas

Class dan Object : Person
http://www.plantuml.com/plantuml/uml/TP7DQeGm4CVlynI3f_RW2nHQn59QUf12ds3KgH_632Jn86NVVMVPoBgH5Hp8x_-Ha1G-a0lBR00QGzxZ3pil5ly1zViDRh0T_WtEXufctaD3H-Pf_M9Zv2ckhUhFYU5Jf2rNlhUS0AGUkGd8au3--7BR5Lyn-vWaYznGWhVeA9hLSGX_YzfKESIhfNFIxohgfHtWCjAAKbcsAMa5zQGLyURo_0sl1trtJ87tV9G7GYoE0XHiMtsJCm00

Class dan Object : Car
http://www.plantuml.com/plantuml/uml/NP312i8m44Jl-Oeb9ptq1mIbKWGldXGyRzjG8ib6qbImuh_RR4jIp27BliaCGye-e0-3DQ8nsFTGeOUFWEbSWzVK0Q5LwxtsI2q3TfweqwGssuMuPm9V8LpzK4q0V26DAEO1Euw4FSWZ0va5pexApRrTG9aJZCLHyBtsnrqcdDptmKnDizkwMXljn39N2PUPo2pbbBEZDbQ8Fr8K1yXFAgymg2Ia-l-SUoLSAce7Qtu0

Membuat Class
Untuk membuat class, kita bisa menggunakan kata kunci class
Penamaan class biasa menggunakan format CamelCase

Kode : Class
class Person
{
}

Membuat Object
Object adalah hasil instansiasi dari sebuah class
Untuk membuat object kita bisa menggunakan kata kunci new, dan diikuti dengan nama Class dan kurung ()

Kode : Object
require_once "data/Person.php";

$person = new Person();

var_dump($person);

Properties
Fields / Properties / Attributes adalah data yang bisa kita sisipkan di dalam Object
Namun sebelum kita bisa memasukkan data di fields, kita harus mendeklarasikan data apa aja yang dimiliki object tersebut di dalam deklarasi class-nya
Membuat field sama seperti membuat variable, namun ditempatkan di block class, namun diawali dengan kata kunci var

Kode : Properties
class Person
{
    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";
}

Manipulasi Properties
Fields yang ada di object, bisa kita manipulasi. 
Untuk memanipulasi data field, sama seperti cara pada variable
Untuk mengakses field, kita butuh kata kunci -> setelah nama object dan diikuti nama fields nya

Kode : Manipulasi Properties
require_once "data/Person.php";

$person = new Person("Eko", "Subang");
$person->name = "Eko";
$person->address = "Subang";

var_dump($person);

echo "Name : $person->name" . PHP_EOL;
echo "Address : $person->address" . PHP_EOL;
echo "Country : $person->country" . PHP_EOL;

Properties Type Declaration
Sama seperti di function, di properties pun, kita bisa membuat type declaration
Ini membuat PHP otomatis mengecek tipe data yang sesuai dengan type declaration yang telah ditentukan
Jika kita mencoba mengubah properties dengan type yang berbeda, maka otomatis akan error
Ingat, bahwa PHP memiliki fitur type juggling, yang secara otomatis bisa mengkonversi ke tipe data lain
Untuk menambahkan type declaration, kita bisa tambahkan setelah kata kunci var di properties

Kode : Properties dengan Type
    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";

Default Properties Value
Sama seperti variable, di properties juga kita bisa langsung mengisi value nya
Ini mirip seperti default value, jadi jika tidak diubah di object, maka properties akan memiliki value tersebut

Kode : Properties Default Value
    var string $country = "Indonesia";

Nullable Properties
Saat kita menambah type declaration di properties atau di function argument, maka secara otomatis kita tidak bisa mengirim data null ke dalam properties atau function argument tersebut
Di PHP 7.4 dikenalkan nullable type, jadi kita bisa mengirim data null ke properties atau function arguments
Caranya sebelum type declaration nya, kita bisa tambahkan tanda ?

Kode : Nullable Properties
    var ?string $address = null;

Function
Selain menambahkan properties, kita juga bisa menambahkan function ke object
Cara dengan mendeklarasikan function tersebut di dalam block class
Sama seperti function biasanya, kita juga bisa menambahkan return value dan parameter
Untuk mengakses function tersebut, kita bisa menggunakan tanda -> dan diikuti dengan nama method nya. Sama seperti mengakses properties

Kode : Function
function sayHello(?string $name)
    {
        if (is_null($name)) {
            echo "Hi, my name is $this->name" . PHP_EOL;
        } else {
            echo "Hi $name, my name is $this->name" . PHP_EOL;
        }
    }

Kode : Memanggil Function
require_once "data/Person.php";

$eko = new Person("Eko", "Subang");
$eko->name = "Eko";
$eko->sayHello("Budi");

$joko = new Person("Joko", "Cirebon");
$joko->name = "Joko";
$joko->sayHello(null);

$eko->info();
$joko->info();

This Keyword
Saat kita membuat kode di dalam function di dalam class, kita bisa menggunakan kata kunci this untuk mengakses object saat ini
Misal kadang kita butuh mengakses properties atau function lain di class yang sama

Kode : This Keyword
 function sayHello(?string $name)
    {
        if (is_null($name)) {
            echo "Hi, my name is $this->name" . PHP_EOL;
        } else {
            echo "Hi $name, my name is $this->name" . PHP_EOL;
        }
    }

Constant
Properties di class bisa diubah, mirip seperti variable
Di class juga kita membuat constant, data yang tidak bisa diubah
Di materi PHP Dasar, kita belajar untuk membuat constant itu perlu menggunakan function define()
Namun sejak PHP 7.4, kita bisa menggunakan kata kunci const untuk membuat constant, mirip seperti variable, namun tidak menggunakan karakter $

Kode : Constant
require_once "data/Person.php";

define("APPLICATION", "Belajar PHP OOP");
const APP_VERSION = "1.0.0";

echo APPLICATION . PHP_EOL;
echo APP_VERSION . PHP_EOL;
echo Person::AUTHOR . PHP_EOL;

Kode : Constant di Class
const AUTHOR = "Programmer Zaman Now";

Kode : Mengakses Constant di Class
echo Person::AUTHOR . PHP_EOL;

self Keyword
Properties vs Constant
Saat kita membuat object, properties yang terdapat di class akan secara otomatis dibuat per object, oleh karena itu untuk mengakses properties, kita perlu menggunakan object, atau jika dari dalam object tersebut sendiri, kita perlu menggunakan kata kunci this
Sedangkan berbeda dengan constant, constant di class tidak akan dibuat per object. Constant itu hidupnya di class, bukan di object, oleh karena itu untuk mengaksesnya kita perlu menggunakan NamaClass::NAMA_CONSTANT
Secara sederhana, properties akan dibuat satu per instance class (object), sedangkan constant dibuat satu per class

self Keyword
Jika di dalam class (misal di function) kita ingin mengakses constant, kita perlu mengakses menggunakan NamaClass::NAMA_CONSTANT
Namun jika di dalam class yang sama, kita bisa menggunakan kata kunci self untuk mempermudah

Kode : self Keyword

class Person {
    function info()
    {
        echo "Author : " . self::AUTHOR . PHP_EOL;
    }
}

$eko->info();
$joko->info();

Constructor
Saat kita membuat Object, maka kita seperti memanggil sebuah function, karena kita menggunakan kurung ()
Di dalam class PHP, kita bisa membuat constructor, constructor adalah function  yang akan dipanggil saat pertama kali Object dibuat.
Mirip seperti di function, kita bisa memberi parameter pada constructor
Nama constructor di PHP haruslah __construct()

Kode : Membuat Constructor
class Person
{
    const AUTHOR = "Programmer Zaman Now";

    var string $name;
    var ?string $address = null;
    var string $country = "Indonesia";

    function __construct(string $name, ?string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

Kode : Menggunakan Constructor

<?php

require_once "data/Person.php";

$eko = new Person("Eko", "Subang");

var_dump($eko);

Destructor
Jika constructor adalah function yang akan dipanggil ketika object dibuat
Destructor adalah function yang akan dipanggil ketika object dihapus dari memory
Biasanya ketika object tersebut sudah tidak lagi digunakan, atau ketika aplikasi akan mati
Untuk membuat function destructor, kita bisa menggunakan nama function __destruct()
Khusus untuk destructor, kita tidak boleh menambahkan function argument
Dalam penggunaan sehari-hari, ini misal cocok untuk menutup koneksi ke database atau menutup proses menulis ke file, sehingga tidak terjadi memory leak

Kode : Destructor
function __destruct()
    {
        echo "Object person $this->name is destroyed" . PHP_EOL;
    }

require_once "data/Person.php";

$eko = new Person("Eko", "Subang");
$joko = new Person("Joko", "Subang");

echo "Program Selesai" . PHP_EOL;

Inheritance
Inheritance atau pewarisan adalah kemampuan untuk menurunkan sebuah class ke class lain
Dalam artian, kita bisa membuat class Parent dan class Child
Class Child, hanya bisa punya satu class Parent, namun satu class Parent bisa punya banyak class Child
Saat sebuah class diturunkan, maka semua properties dan function yang ada di class Parent, secara otomatis akan dimiliki oleh class Child
Untuk melakukan pewarisan, di class Child, kita harus menggunakan kata kunci extends lalu diikuti dengan nama class parent nya.

Kode : Inheritance
class Manager
{
    var string $name;

    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is Manager $this->name" . PHP_EOL;
    }
}

class VicePresident extends Manager
{

    public function __construct(string $name = "")
    {
        // tidak wajib, tapi direkomendasikan
        parent::__construct($name, "VP");
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is VP $this->name" . PHP_EOL;
    }
}

Kode : Mengakses Method Parent
require_once "data/Manager.php";

$manager = new Manager();
$manager->name = "Budi";
$manager->sayHello("Joko");

$vp = new VicePresident();
$vp->name = "Eko";
$vp->sayHello("Joko");

Namespace
Saat kita membuat aplikasi, bisa dipastikan kita akan banyak sekali membuat class
Jika class terlalu banyak, kadang akan menyulitkan kita untuk mencari atau mengklasifikasikan jenis-jenis class
PHP memiliki fitur namespace, dimana kita bisa menyimpan class-class kita di dalam namespace
Namespace bisa nested, dan jika kita ingin mengakses class yang terdapat di namespace, kita perlu menyebutkan nama namespace nya
Namespace bagus ketika kita punya beberapa class yang sama, dengan menggunakan namespace nama class sama tidak akan menjadikan error di PHP

Membuat Namespace
Untuk membuat namespace, kita bisa menggunakan kata kunci namespace
Jika kita ingin membuat sub namespace, kita cukup gunakan karakter \ setelah namespace sebelumnya

Kode : Membuat Namespace
namespace Data\One {
    class Conflict
    {
    }

    class Sample
    {
    }

    class Dummy
    {
    }
}

namespace Data\Two {
    class Conflict
    {
    }
}

Kode : Membuat Object dari Namespace
require_once "data/Conflict.php";
    require_once "data/Helper.php";

    $conflict1 = new Data\One\Conflict();
    $conflict2 = new Data\Two\Conflict();

Function dan Constant di Namespace
Selain class, kita juga menggunakan function dan constant di namespace
Dan jika kita ingin menggunakan function atau constant tersebut, kita bisa menggunakannya dengan diawali dengan nama namespace nya

Kode : Function dan Constant di Namespace
namespace Helper;

function helpMe()
{
    echo "HELP ME" . PHP_EOL;
}

const APPLICATION = "Belajar PHP OOP";

Global Namespace
Secara default saat kita membuat kode di PHP sebenarnya itu disimpan di global namespace
Global namespace adalah namespace yang tidak memiliki nama namespace

Kode : Global Namespace
namespace {

    require_once "data/Conflict.php";
    require_once "data/Helper.php";

    $conflict1 = new Data\One\Conflict();
    $conflict2 = new Data\Two\Conflict();

    echo Helper\APPLICATION . PHP_EOL;

    Helper\helpMe();
}

Import

use Keyword
Sebelumnya kita sudah tahu bahwa untuk menggunakan class, function atau constant di namespace kita perlu menyebutkan nama namespace nya di awal
Jika terlalu sering menggunakan class, function atau constant yang sama, maka terlalu banyak duplikasi dengan menyebut namespace yang sama berkali-kali
Hal ini bisa kita hindari dengan cara mengimport class, function atau constant tersebut dengan menggunakan kata kunci use

Kode : use Keyword
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\Conflict;
use function Helper\helpMe;
use const Helper\APPLICATION;

$conflict1 = new Conflict();
$conflict2 = new Data\Two\Conflict();

helpMe();

echo APPLICATION . PHP_EOL;

Alias
Saat kita menggunakan use, artinya kita tidak perlu lagi menggunakan nama namespace diawal class ketika kita ingin membuat class tersebut
Namun bagaimana jika kita ternyata nama class nya sama?
Untungnya PHP memiliki fitur yang namanya alias
Alias adalah kemampuan membuat nama lain dari class, function atau constant yang ada
Kita bisa menggunakan kata kunci as setelah melakukan use

Kode : Alias
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\Conflict as Conflict1;
use Data\Two\Conflict as Conflict2;
use function Helper\helpMe as help;
use const Helper\APPLICATION as APP;

$conflict1 = new Conflict1();
$conflict2 = new Conflict2();

help();

echo APP . PHP_EOL;

Group use Declaration
Kadang kita butuh melakukan import banyak hal di satu namespace yang sama
PHP memiliki fitur grup use, dimana kita bisa import beberapa class, function atau constant dalam satu perintah use
Untuk melakukan itu, kita bisa menggunakan kurung { } 

Kode : Group use Declaration
require_once "data/Conflict.php";
require_once "data/Helper.php";

use Data\One\{Conflict as Conflict1, Dummy, Sample};
use function Helper\{helpMe};

$conflict = new Conflict1();
$dummy = new Dummy();
$sample = new Sample();

Visibility
Visibility / Access modifier adalah kemampuan properties, function dan constant dapat diakses dari mana saja
Secara default, properties, function dan constant yang kita buat di dalam class bisa diakses dari mana saja, atau artinya dia adalah public
Selain public, masih ada beberapa visibility lainnya
Secara default kata kunci var untuk properties adalah sifatnya public

Access Level
 Modifier
Class
Subclass
World
public
Y
Y
Y
protected
Y
Y
N
private
Y
N
N

Kode : Class Product
class Product
{
    protected string $name;
    protected int $price;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }
}

class ProductDummy extends Product
{

    public function info()
    {
        echo "Name $this->name" . PHP_EOL;
        echo "Price $this->price" . PHP_EOL;
    }
}

Kode : Menggunakan Product
require_once "data/Product.php";

$product = new Product("Apple", 20000);

echo $product->getName() . PHP_EOL;
echo $product->getPrice() . PHP_EOL;

$dummy = new ProductDummy("Dummy", 1000);
$dummy->info();

Function Overriding
Function overriding adalah kemampuan mendeklarasikan ulang function di child class, yang sudah ada di parent class
Saat kita melakukan proses overriding tersebut, secara otomatis ketika kita membuat object dari class child, function yang di class parent tidak bisa diakses lagi

Kode : Method Overriding
class Manager
{
    var string $name;

    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is Manager $this->name" . PHP_EOL;
    }
}

class VicePresident extends Manager
{

    public function __construct(string $name = "")
    {
        // tidak wajib, tapi direkomendasikan
        parent::__construct($name, "VP");
    }

    function sayHello(string $name): void
    {
        echo "Hi $name, my name is VP $this->name" . PHP_EOL;
    }
}

Kode : Mengakses Function Overriding
require_once "data/Manager.php";

$manager = new Manager();
$manager->name = "Budi";
$manager->sayHello("Joko");

$vp = new VicePresident();
$vp->name = "Eko";
$vp->sayHello("Joko");

parent Keyword
Kadang kita ingin mengakses function yang terdapat di class parent yang sudah terlanjur kita override di class child
Untuk mengakses function milik class parent, kita bisa menggunakan kata kunci parent
Sederhananya, parent digunakan untuk mengakses class parent

Kode : Parent Keyword
namespace Data;

class Shape
{

    public function getCorner()
    {
        return -1;
    }
}

class Rectangle extends Shape
{

    public function getCorner()
    {
        return 4;
    }

    public function getParentCorner()
    {
        return parent::getCorner();
    }
}

Kode menggunakan parent keyword
require_once "data/Shape.php";

use Data\{Shape, Rectangle};

$shape = new Shape();
echo $shape->getCorner() . PHP_EOL;

$rectangle = new Rectangle();
echo $rectangle->getCorner() . PHP_EOL;
echo $rectangle->getParentCorner() . PHP_EOL;

Constructor Overriding
Karena constructor sama seperti function, maka constructor-pun bisa kita deklarasikan ulang di class Child nya
Sebenarnya di PHP, kita bisa meng-override function dengan arguments yang berbeda, namun sangat tidak disarankan
Jika kita melakukan override function dengan arguments berbeda, maka PHP akan menampilkan WARNING
Namun berbeda dengan constructor overriding, kita boleh meng-override dengan mengubah arguments nya, namun direkomendasikan untuk memanggil parent constructor

Kode : Merubah Arguments Overriding
class Manager
{
    var string $name;

    var string $title;

    public function __construct(string $name = "", string $title = "Manager")
    {
        $this->name = $name;
        $this->title = $title;
    }

Kode : Constructor Overriding (2)
class VicePresident extends Manager
{

    public function __construct(string $name = "")
    {
        // tidak wajib, tapi direkomendasikan
        parent::__construct($name, "VP");
    }

Polymorphism
Polymorphism berasal dari bahasa Yunani yang berarti banyak bentuk.
Dalam OOP, Polymorphism adalah kemampuan sebuah object berubah bentuk menjadi bentuk lain
Polymorphism erat hubungannya dengan Inheritance

Kode : Inheritance
class Programmer
{

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class BackendProgrammer extends Programmer
{
}

class FrontendProgrammer extends Programmer
{
}

class Company
{
    public Programmer $programmer;
}


function sayHelloProgrammer(Programmer $programmer)
{
    if ($programmer instanceof BackendProgrammer) {
        echo "Hello Backend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof FrontendProgrammer) {
        echo "Hello Frontend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof Programmer) {
        echo "Hello Programmer $programmer->name" . PHP_EOL;
    }
}


Kode : Polymorphism
require_once "data/Programmer.php";

$company = new Company();
$company->programmer = new Programmer("Eko");
var_dump($company);

$company->programmer = new BackendProgrammer("Eko");
var_dump($company);

$company->programmer = new FrontendProgrammer("Eko");
var_dump($company);

Kode : Function Argument Polymorphism
function sayHelloProgrammer(Programmer $programmer)
{
    if ($programmer instanceof BackendProgrammer) {
        echo "Hello Backend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof FrontendProgrammer) {
        echo "Hello Frontend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof Programmer) {
        echo "Hello Programmer $programmer->name" . PHP_EOL;
    }
}

sayHelloProgrammer(new Programmer("Eko"));
sayHelloProgrammer(new BackendProgrammer("Eko"));
sayHelloProgrammer(new FrontendProgrammer("Eko"));

Type Check & Casts
Sebelumnya kita sudah tau cara melakukan konversi tipe data bukan class
Khusus untuk tipe data object, kita tidak perlu melakukan konversi secara eksplisit
Namun agar aman, sebelum melakukan casts, pastikan kita melakukan type check (pengecekan tipe data), dengan menggunakan kata kunci instanceof
Hasil operator instanceof adalah boolean, true jika tipe data sesuai, false jika tidak sesuai

Kode : Type Check & Casts
function sayHelloProgrammer(Programmer $programmer)
{
    if ($programmer instanceof BackendProgrammer) {
        echo "Hello Backend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof FrontendProgrammer) {
        echo "Hello Frontend Programmer $programmer->name" . PHP_EOL;
    } else if ($programmer instanceof Programmer) {
        echo "Hello Programmer $programmer->name" . PHP_EOL;
    }
}

Abstract Class
Saat kita membuat class, kita bisa menjadikan sebuah class sebagai abstract class.
Abstract class artinya, class tersebut tidak bisa dibuat sebagai object secara langsung, hanya bisa diturunkan
Untuk membuat sebuah class menjadi abstract, kita bisa menggunakan kata kunci abstract sebelum kata kunci class
Sehingga Abstract Class bisa kita gunakan sebagai kontrak child class

Kode : Abstract Class
namespace Data;

abstract class Location
{

    public string $name;
}

class City extends Location
{
}

class Province extends Location
{
}

class Country extends Location
{
}

Kode : Membuat Abstract Class
require_once "data/Location.php";

use Data\{Location, City, Province, Country};

// $location = new Location(); ERROR

$city = new City();
$province = new Province();
$country = new Country();

Abstract Function
Saat kita membuat class yang abstract, kita bisa membuat abstract function juga di dalam class abstract tersebut
Saat kita membuat sebuah abstract function, kita tidak boleh membuat block function untuk function tersebut
Artinya, abstract function wajib di override di class child
Abstract function tidak boleh memiliki access modifier private

Kode : Abstract Function
namespace Data;

require_once "Food.php";

abstract class Animal
{
    public string $name;

    abstract public function run(): void;

    abstract public function eat(AnimalFood $animalFood): void;
}

class Cat extends Animal
{
    public function run(): void
    {
        echo "Cat $this->name is running" . PHP_EOL;
    }

    public function eat(AnimalFood $animalFood): void
    {
        echo "Cat is eating" . PHP_EOL;
    }
}

Kode : Menggunakan Abstract Function
require_once "data/Animal.php";

use Data\{Animal, Cat, Dog};

$cat = new Cat();
$cat->name = "Luna";
$cat->run();

Getter dan Setter

Encapsulation
Encapsulation artinya memastikan data sensitif sebuah object tersembunyi dari akses luar
Hal ini bertujuan agar kita bisa menjaga agar data sebuah object tetap baik dan valid
Untuk mencapai ini, biasanya kita akan membuat semua properties menggunakan access modifier private, sehingga tidak bisa diakses atau diubah dari luar
Agar bisa diubah, kita akan menyediakan function untuk mengubah dan mendapatkan properties tersebut

Getter dan Setter
Di PHP, proses encapsulation sudah dibuat standarisasinya, dimana kita bisa menggunakan Getter dan Setter method.
Getter adalah function yang dibuat untuk mengambil data field
Setter ada function untuk mengubah data field

Getter dan Setter Method
 Tipe Data
Getter Method
Setter Method
boolean
isXxx(): bool
setXxx(bool value)
lainnya
getXxx(): tipeData
setXxx(tipeData value)

Kode : Getter dan Setter
class Category
{
    private string $name;
    private bool $expensive;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (trim($name) != "") {
            $this->name = $name;
        }
    }

    public function isExpensive(): bool
    {
        return $this->expensive;
    }

    public function setExpensive(bool $expensive): void
    {
        $this->expensive = $expensive;
    }
}

Kode : Menggunakan Getter dan Setter
require_once "data/Category.php";

$category = new Category();
$category->setName("Handphone");
$category->setExpensive(true);

$category->setName("              ");
echo "Name : {$category->getName()}" . PHP_EOL;
echo "Expensive : {$category->isExpensive()}" . PHP_EOL;

Kode : Validation di Setter
public function setName(string $name): void
    {
        if (trim($name) != "") {
            $this->name = $name;
        }
    }

Interface
Sebelumnya kita sudah tahu bahwa abstract class bisa kita gunakan sebagai kontrak untuk class child nya.
Namun sebenarnya yang lebih tepat untuk kontrak adalah Interface
Jangan salah sangka bahwa Interface disini bukanlah User Interface
Interface mirip seperti abstract class, yang membedakan adalah di Interface, semua method otomatis abstract, tidak memiliki block
Di interface kita tidak boleh memiliki properties, kita hanya boleh memiliki constant 
Untuk mewariskan interface, kita tidak menggunakan kata kunci extends, melainkan implements
Dan berbeda dengan class, kita bisa implements lebih dari satu interface

Kode : Membuat Interface
namespace Data;

interface HasBrand
{
    function getBrand(): string;
}

interface IsMaintenance
{
    function isMaintenance(): bool;
}

interface Car extends HasBrand
{
    function drive(): void;

    function getTire(): int;
}

Kode : Implement Interface
class Avanza implements Car, IsMaintenance
{

    public function drive(): void
    {
        echo "Drive Avanza" . PHP_EOL;
    }

    public function getTire(): int
    {
        return 4;
    }

    public function getBrand(): string
    {
        return "Toyota";
    }

    public function isMaintenance(): bool
    {
        return false;
    }
}

Interface Inheritance
Sebelumnya kita sudah tahu kalo di PHP, child class hanya bisa punya 1 class parent
Namun berbeda dengan interface, sebuah child class bisa implement lebih dari 1 interface
Bahkan interface pun bisa implement interface lain, bisa lebih dari 1. Namun jika interface ingin mewarisi interface lain, kita menggunakan kata kunci extends, bukan implements

Kode : Interface Inheritance
interface HasBrand
{
    function getBrand(): string;
}

interface IsMaintenance
{
    function isMaintenance(): bool;
}

interface Car extends HasBrand
{

Kode : Multiple Interface Inheritance
class Avanza implements Car, IsMaintenance
{

    public function drive(): void
    {
        echo "Drive Avanza" . PHP_EOL;
    }

    public function getTire(): int
    {
        return 4;
    }

    public function getBrand(): string
    {
        return "Toyota";
    }

    public function isMaintenance(): bool
    {
        return false;
    }
}

Trait
Selain class dan interface, di PHP terdapat feature lain bernama trait
Trait mirip dengan abstract class, kita bisa membuat konkrit function atau abstract function
Yang membedakan adalah, di trait bisa kita tambahkan ke dalam class lebih dari satu
Trait mirip seperti ekstension, dimana kita bisa menambahkan konkrit function ke dalam class dengan trait
Secara sederhana trait adalah digunakan untuk menyimpan function-function yang bisa digunakan ulang di beberapa class
Untuk menggunakan trait di class, kita bisa menggunakan kata kunci use

Kode : Membuat Trait
namespace Data\Traits;

trait SayGoodBye
{
    public function goodBye(?string $name): void
    {
        if (is_null($name)) {
            echo "Good bye" . PHP_EOL;
        } else {
            echo "Good bye $name" . PHP_EOL;
        }
    }
}

Kode : Menggunakan Trait
trait All
{
    use SayGoodBye, SayHello, HasName, CanRun {
        // bisa di override
        // hello as private;
        // goodBye as private;
    }
}

class Person extends ParentPerson
{
    use All;

    public function run(): void
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
}

Trait Properties
Berbeda dengan interface, di trait, kita bisa menambahkan properties
Dengan menambahkan properties, secara otomatis class tersebut akan memiliki properties yang ada di trait

Kode : Trait Properties
trait HasName
{
    public string $name;
}

trait All
{
    use SayGoodBye, SayHello, HasName, CanRun {
        // bisa di override
        // hello as private;
        // goodBye as private;
    }
}

class Person extends ParentPerson
{
    use All;

    public function run(): void
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
}

Kode : Menggunakan Trait Properties
require_once "data/SayGoodBye.php";

use Data\Traits\{Person, SayHello, SayGoodBye};

$person = new Person();
$person->goodBye("Joko");
$person->hello("Budi");

$person->name = "Eko";
var_dump($person);

$person->run();

Trait Abstract Function
Selain konkrit function, di trait juga kita bisa menambahkan abstract function
Jika terdapat abstract function di trait, maka secara otomatis function tersebut harus di override di class yang menggunakan trait tersebut

Kode : Trait Abstract Function
trait CanRun
{
    public abstract function run(): void;
}

class Person extends ParentPerson
{
    use All;

    public function run(): void
    {
        echo "Person $this->name is running" . PHP_EOL;
    }
}

Trait Overriding
Jika sebuah class memiliki parent class yang memiliki function yang sama dengan function di trait, maka secara otomatis trait akan meng-override function tersebut
Namun jika kita membuat function yang sama di class nya, maka secara otomatis kita akan meng-override function di trait
Sehingga posisinya seperti ini ParentClass =override by=> Trait =override by=> ChildClass

Kode : Override  Trait
class Person
{

    public function goodBye(?string $name): void
    {
        echo "Good bye in Person" . PHP_EOL;
    }

    public function hello(?string $name): void
    {
        echo "Hello in Person" . PHP_EOL;
    }
}

Trait Visibility Override
Selain melakukan override function di class, kita juga bisa melakukan override visibility function yang terdapat di trait
Namun untuk melakukan ini tidak perlu membuat function baru di class, kita bisa gunakan secara sederhana ketika menggunakan trait nya

Kode : Trait Visibility Override
class Person {
    use SayGoodBye, SayHello, HasName, CanRun {
        // bisa di override
        // hello as private;
        // goodBye as private;
    }
}

Trait Conflict
Jika kita menggunakan lebih dari satu trait, lalu terdapat function yang sama di trait tersebut
Maka hal tersebut akan menyebabkan konflik
Jika terjadi konflik seperti ini, kita bisa mengatasinya dengan menggunakan kata kunci insteadof

Kode : Trait Conflict (1)
trait A
{
    function doA(): void
    {
        echo "a" . PHP_EOL;
    }

    function doB(): void
    {
        echo "b" . PHP_EOL;
    }
}

trait B
{
    function doA(): void
    {
        echo "A" . PHP_EOL;
    }

    function doB(): void
    {
        echo "B" . PHP_EOL;
    }
}

Kode : Trait Conflict (2)
class Sample
{
    use A, B {
        A::doA insteadof B;
        B::doB insteadof A;
    }
}

$sample = new Sample();
$sample->doA();
$sample->doB();

Trait Inheritance
Sebelumnya kita sudah tahu bahwa class bisa menggunakan trait lebih dari satu
Lantas bagaimana dengan trait yang menggunakan trait lain?
Trait bisa menggunakan trait lain, mirip seperti interface yang bisa implement interface lain
Untuk menggunakan trait lain dari trait, penggunaannya sama seperti dengan penggunaan trait di class

Kode : Trait Inheritance
trait All
{
    use SayGoodBye, SayHello, HasName, CanRun {
        // bisa di override
        // hello as private;
        // goodBye as private;
    }
}
class Person extends ParentPerson
{
    use All;

Final Class
Kata kunci final bisa digunakan di class, dimana jika kita menggunakan kata kunci final sebelum class, maka kita menandakan bahwa class tersebut tidak bisa diwariskan lagi
Secara otomatis semua class child nya akan error

Kode : Final Class
class SocialMedia
{
    public string $name;
}

final class Facebook extends SocialMedia
{
    final public function login(string $username, string $password): bool
    {
        return true;
    }
}

// error
class FakeFacebook extends Facebook
{

Final Function
Kata kunci final juga bisa digunakan di function
Jika sebuah function kita tambahkan kata kunci final, maka artinya function tersebut tidak bisa di override lagi di class child nya
Ini sangat cocok jika kita ingin mengunci implementasi dari sebuah method agar tidak bisa diubah lagi oleh class child nya

Kode : Final Method
class Facebook extends SocialMedia
{
    final public function login(string $username, string $password): bool
    {
        return true;
    }
}

// error
class FakeFacebook extends Facebook
{
    // error
    public function login(string $username, string $password): bool
    {
        return false;
    }
}

Anonymous Class
Anonymous class atau class tanpa nama.
Adalah kemampuan mendeklarasikan class, sekaligus meng-instansiasi object-nya secara langsung
Anonymous class sangat cocok ketika kita berhadapan dengan kasus membuat implementasi interface atau abstract class sederhana, tanpa harus membuat implementasi class nya

Kode : Anonymous Class
interface HelloWorld
{
    function sayHello(): void;
}

$helloWorld = new class("Eko") implements HelloWorld
{
    public function sayHello(): void
    {
        echo "Hello $this->name" . PHP_EOL;
    }
};
$helloWorld->sayHello();

Constructor di Anonymous Class
Anonymous class juga mendukung constructor
Jadi kita bisa menambahkan constructor jika kita mau

Kode : Constructor di Anonymous Class
$helloWorld = new class("Eko") implements HelloWorld
{

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

*/