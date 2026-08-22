# Exercícios PHP com JSON, XML e APIs

Coleção de exercícios em PHP para praticar leitura e geração de dados em XML e JSON, integração com MySQL e consumo de uma API REST pública.

## Exercícios

| Pasta | Tema | Descrição |
| --- | --- | --- |
| `exercicio1` | MySQL e XML | Consulta salões e serviços no MySQL, monta uma estrutura XML e exibe os dados em HTML. |
| `exercicio2` | XML | Lê notas fiscais de um arquivo XML, apresenta uma tabela e abre o detalhe de cada nota. |
| `exercicio3` | JSON local | Pesquisa filmes usando os dados de `json.json`. |
| `exercicio4` | API do GitHub | Busca um perfil público do GitHub pela API oficial. |

## Tecnologias

- PHP;
- HTML e CSS;
- MySQL (exercício 1);
- XML e SimpleXML;
- JSON;
- API pública do GitHub.

## Pré-requisitos

- PHP 7.4 ou superior;
- Extensões PHP `mysqli` e `simplexml` habilitadas;
- MySQL/MariaDB para o exercício 1;
- Acesso à internet e `allow_url_fopen` habilitado para o exercício 4.

## Configurar o exercício 1

1. Inicie o MySQL/MariaDB.
2. Importe o script [`exercicio1/jsonApi.sql`](exercicio1/jsonApi.sql), que cria o banco `jsonApi`, as tabelas `salao` e `servico`, além de registros de exemplo.
3. Caso as suas credenciais sejam diferentes, altere as variáveis no início de [`exercicio1/index.php`](exercicio1/index.php):

```php
$host = "localhost";
$user = "root";
$pass = "root";
$banco = "jsonapi";
```

## Executar localmente

Na raiz do projeto, inicie o servidor interno do PHP:

```powershell
php -S localhost:8000
```

Depois, abra no navegador:

| Exercício | Endereço |
| --- | --- |
| Salões e serviços (MySQL/XML) | [http://localhost:8000/exercicio1/](http://localhost:8000/exercicio1/) |
| Notas fiscais em XML | [http://localhost:8000/exercicio2/](http://localhost:8000/exercicio2/) |
| Pesquisa de filmes em JSON | [http://localhost:8000/exercicio3/](http://localhost:8000/exercicio3/) |
| Pesquisa de perfil GitHub | [http://localhost:8000/exercicio4/](http://localhost:8000/exercicio4/) |

## Funcionalidades em destaque

### Exercício 2 — notas fiscais

O arquivo `xml.xml` contém empresas, valores e dados de clientes. A página inicial lista os registros e cria links para `nota.php?v=<índice>`, que apresenta a nota selecionada com sua logomarca.

### Exercício 3 — pesquisa de filmes

O formulário recebe parte de um título e procura correspondências em `json.json`. Para cada resultado, são exibidos título, ano e diretor.

### Exercício 4 — GitHub

O formulário recebe um nome de usuário e consulta `https://api.github.com/users/<usuário>`. Quando o perfil existe, a aplicação mostra login, avatar e biografia; caso contrário, informa que o usuário não foi encontrado.

## Estrutura

```text
.
├── css/          # Estilos compartilhados e da nota fiscal
├── img/          # Logomarcas usadas no exercício XML
├── exercicio1/   # MySQL, geração de XML e listagem de salões
├── exercicio2/   # Leitura de XML e detalhes de notas fiscais
├── exercicio3/   # Pesquisa no arquivo JSON de filmes
└── exercicio4/   # Consulta de perfis na API do GitHub
```

## Observação

Os exemplos foram desenvolvidos para estudo. Antes de usá-los em produção, proteja credenciais, valide e trate as entradas do usuário e escape os dados exibidos em HTML.
