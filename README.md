# oficina

### Irei considerar que ja tenha o composer, laravel e o mysql community instalados e as varaveis ambiante de todos configuradas.

Baixe o projeto e entre na pasta do projeto pelo cmd.

0. Vá na pasta oficina e lá encontrará um arquivo cujo nome é: ``.env.example``, renomeie e deixe-o assim: ``.env``
> agora edite ele e na parte que está escrito ```DB_USERNAME e DB_PASSWORD``` substitua os parâmetros pelos seus dados de login e senha do mysql.

0.1.  depois vá no cmd e verifique se está dentro da pasta(no cmd) e utilize o seguinte comando:
> php artisan key:generate  //para gerar uma chave aleatoria para poder acessar as páginas

1. para toda requisição pela porta localhost:8000 ser redirecionada para a pasta: public
>php -S localhost:8000 -t public public  (depois aperte ctrl+C)

2. Entre no mysql pelo cmd
>mysql -uroot -proot

3. Crie uma database no mysql pelo cmd, chamada:
>create database oficina;

4. saia do mysql com ```exit;``` e utilize este comando para criar automaticamente uma tabela chamada clientes
>php artisan migrate

5. Para rodar o projeto, na pasta que tem o projeto digite
>php artisan serve

e acesse o endereço [local](http://localhost:8000)
