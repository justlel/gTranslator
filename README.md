# gTranslator
A simple PHP library to translate text using Google Translator API. Totally free.
## Usage
1. First, you need to add the library in your project. Write:
`include "gTranslator.php";`
2. Then, use it where you want!
`translate( _text to translate_ , _from lang_ , _to lang_ )`
### Exemple
`include "gTranslator.php";
echo translate('Ciao!', 'it', 'en');`
> The output will be:
> `Hello!`
