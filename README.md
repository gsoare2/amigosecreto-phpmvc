# Sistema amigo secreto: 
 
# 1º passo: 
Primeiro de tudo é saber se o servidor local está rodando (apache e mySQL). Após isso, colocar a pasta AmigoSecreto na pasta do servidor apache, se estiver usando o XAMPP é o htdocs, ou o WAMP é a pasta www. 
 
# 2º passo: 
Na pasta SistemaAmigoSecreto/BD tem um arquivo php chamado script.php, coloque na mesma pasta em que você colocou o diretório AmigoSecreto. 
 
# 3º passo: 
 Antes de tudo, abra o arquivo script.php no bloco de notas, e lá vai ter um linha escrito o seguinte: 
 
         $conn = mysql_connect("localhost", "root", "0000", "amigosecreto"); 
 
         localhost-> Servidor.
         root-> Usuário do banco. 
         0000-> Senha do banco.
         amigosecreto-> Nome do banco de dados. 
  
 Edite os dados dessa linha conforme suas necessidades pois o usuário pode ser diferente, ou até mesmo a senha e a não edição desses dados pode causar erros e não funcionamento do sistema. 
 
# 4º passo: 
 Na pasta do servidor, no diretório AmigoSecreto, dentro da pasta DAL tem um arquivo chamado Banco.php, abra ele com o bloco de notas e terá um bloco de código parecido com este: 
 
         $this->debug = true; 
         $this->server = "localhost"; 
         $this->user = "root"; 
         $this->password = "0000"; 
         $this->database = "amigosecreto"; 
 
Troque o user ou password conforme suas necessidade. Como já dito isso, a não edição desses valores conforme sua necessidade pode causar o não funcionamento do sistema. 
 
# 5º passo: 
 Feito isso, vá no navegador, digite localhost ou 127.0.0.1 e vai aparecer alguns diretórios e arquivos. Clique no arquivo script.php. (Ele é responsável por criar o banco de dados inteiro.) 
 
# 6º passo: 
 Depois de feito tudo isso, novamente entre em localhost ou 127.0.0.1 e procure o diretório AmigoSecreto, clique nele. Vá no campo onde fica o link da pagina e coloque isso na frente -> View/?pagina=home 
 
 
 
Obs: Quando for cadastrar clicar fora do input para validar o botão caso as informações estejam certas.
