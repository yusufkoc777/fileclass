Nedir, Nasıl Kullanılır?
=========

Bu dosya sınıfı ile bir dosya oluşturup kaydedebilirsiniz.

Aynı zamanda, bir dosya açabilirsiniz.

Sınıfı başlatmak
---------

    $file = new File();
    // veya
    // $file = new File("Lorem ipsum dolor sit amet");

Bir dosya oluşturmak
---------

    $file->setContents("Lorem ipsum dolor sit amet");

Dosyayı kaydetmek
---------

    $file->saveFile("example.txt");

Dosya açmak
---------

    $file->loadFile("example.txt");

Dosya içeriği okumak
---------

    echo "<pre>".$file->getContents()."</pre>";

Örnek
=========

    $file = new File();
    $file->setContents("Lorem ipsum dolor sit amet");
    $file->saveFile("example.txt");


