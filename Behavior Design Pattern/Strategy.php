<?php
interface AbsDocumentState
{
    function handle();
}
class NewDocumentState implements AbsDocumentState
{
    function handle()
    {
        writeln("New Document State");
    }
}
class OpenDocumentState implements AbsDocumentState
{
    function  handle()
    {
        writeln("Open Docuemnet State");
    }
}
class Document
{
    protected $state;
    function __construct($state)
    {
        if (is_numeric($state)) {
            switch ($state) {
                case 1:
                    $this->state = new NewDocumentState();
                case 2:
                    $this->state = new OpenDocumentState();
                default:
                    $this->state = new NewDocumentState();
                    break;
            }
        }
        $this->state->handle();
    }
}
function writeln($line_in)
{
    echo $line_in . "<br/>";
}
writeln('BEGIN TESTING STRATEGY PATTERN');
writeln('');
$document = new Document(1);
