# Laravel 5.1 Feed Reader

- [Resumo](#resumo)
- [Instalação](#instalacao)
	- [Requisitos](#instalacao-requisitos)
	- [Produção](#instalacao-producao)
	- [Desenvolvimento](#instalacao-desenvolvimento)
- [Documentacao](#documentacao)
	- [FeedFactory](#documentacao-feedfactory)
	- [Feed](#documentacao-feed)

----------
<a name='resumo'></a>
## Resumo
Pequeno Feed-Reader utilizando o Framework Laravel 5.1. Estamos utilizando o suporte do Laravel Elixir em conjunto com Bower para suprir a necessidade de gerenciar dependências.

----------
<a name='instalacao'></a>
## Instalação

<a name='instalacao-requisitos'></a>
#### Requisitos
Para instalação do Feed-Reader será necessário apenas **PHP >= 5.5.9** e **COMPOSER** para download das dependências iniciais.

<a name='instalacao-requisitos'></a>
#### Produção
Para execução do Feed-Reader basta rodas os seguintes comandos no terminal:

    composer update
    php artisan serve

O Feed-Reader através da url: http://localhost:8000

<a name='instalacao-desenvolvimento'></a>
#### Desenvolvimento
Para desenvolvimento será necessário adicionalmente **node.js+npm**, **bower** e **gulp**.
Para iniciar desenvolvimento basta rodas os seguintes comandos no terminal:

    npm install
    bower update
    gulp && gulp watch

----------
<a name='documentacao'></a>
## Documentacção
O sistema é composto de um simples controller dentro do arquivo de rotas (/app/Http/routes.php) que instancia o FeedFactory e renderiza o view.

<a name='documentacao-feedfactory'></a>
#### FeedFactory
Consulta no servidor e entrega os fFeeds recuperados através do método **get()**. A Classe ainda armazena um cache configurável evitando excesso de consultas http desnecessárias.

    use App\FeedFactory;
    $feedFactory = new FeedFactory($cache); // $cache = tempo em minutos
    
    // retorna um array de objetos Feed
    $feedFactory->get($limit, $order='pubDate', $direction='desc');
    

<a name='documentacao-feed'></a>
#### Feed
Objeto simples com dados de um Feed.

    use App\Feed;
    $feed = new Feed($title, $link, $description, $category, $pubDate);

    foreach ($feeds as $feed) {
	    echo $feed->title;
	    echo $feed->category;
	    echo $feed->description;
	    echo $feed->link;
	    echo $feed->pubDate; // objeto Carbon (http://carbon.nesbot.com/docs/)
    }


