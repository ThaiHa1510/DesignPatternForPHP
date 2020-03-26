<?php
class Book{
    protected $title;
    protected $author;
    public function __construct($title,$author){
        $this->title=$title;
        $this->author=$author;
    }
    public function getAuthor(){
        return $this->title;
    }
    public function getTitle(){
        return $this->author;
    }
    public function getTitleandAuthor(){
        return $this->title . " by" .$this->author;
    }
}
class BookList{
    protected $booklist=array();
    protected $bookCount=0;
    function __construct(){
        //$booklist.push($book);
    }
    function hasNext(){
        if($bookIndex <$bookCount){
            return true;
        }
        else{
            return false;
        }
    }
    public function getBookCount(){
        return $this->bookCount;
    }
    public function setBookCount($index){
        $this->bookCount=$index;
    }
    public function getBook($book_index){
        if($book_index <= $this->getbookCount() && $book_index <=$this->getBookCount()){
            return $this->booklist[$book_index];
        }
        else{
            return NULL;
        }
    }
    public function addBook(Book $book){
        $this->booklist[$this->getBookCount()] =$book;
        $this->setBookCount($this->getBookCount()+1);

        return $this->getBookCount();
    }
    public function removeBook(Book $book_in){
        $counter = 0;
      while (++$counter <= $this->getBookCount()) {
        if ($book_in->getTitleandAuthor() == 
          $this->books[$counter]->getTitleandAuthor())
          {
            for ($x = $counter; $x < $this->getBookCount(); $x++) {
              $this->books[$x] = $this->books[$x + 1];
          }
          $this->setBookCount($this->getBookCount() - 1);
        }
      }
      return $this->getBookCount();
    }

}
class BookListIterator extends BookList{
    protected $bookList;
    protected $currentBook=1;
    function __construct(BookList $bookList){
        $this->bookList=$bookList;
    
    }
    public function getCurrentBook() {
        if (($this->currentBook > 0) && 
            ($this->bookList->getBookCount() >= $this->currentBook)) {
          return $this->bookList->getBook($this->currentBook);
        }
        //return $this->bookList->getBook(1);
      }
      public function getNextBook() {
        if ($this->hasNextBook()) {
          return $this->bookList->getBook(++$this->currentBook);
        } else {
          return NULL;
        }
      }
    function hasNextBook(){
        if($this->currentBook < $this->bookList->getBookCount()-1){
            return true;
        }
        else{
            return false;
        }
    }
}
writeln('BEGIN TESTING ITERATOR PATTERN');
  writeln('');
 
  $firstBook = new Book('Core PHP Programming, Third Edition', 'Atkinson and Suraski');
  $secondBook = new Book('PHP Bible', 'Converse and Park');
  $thirdBook = new Book('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');

  $books = new BookList();
  $books->addBook($firstBook);
  $books->addBook($secondBook);
  $books->addBook($thirdBook);
  writeln('Testing the Iterator');
 
  $booksIterator = new BookListIterator($books);
 
  while ($booksIterator->hasNextBook()) {
    $books = $booksIterator->getNextBook();
    writeln('getting next book with iterator :');
    writeln($books->getTitleandAuthor());
    writeln('');
  }
 
  $books = $booksIterator->getCurrentBook();
  writeln('getting current book with iterator :');
  writeln($books->getTitleandAuthor());
  writeln('');  

 // writeln('Testing the Reverse Iterator');
  function writeln($line_in) {
    echo $line_in."<br/>";
  }