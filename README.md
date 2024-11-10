# WY Challenge Project

A maquete em figma pode ser encontrada neste [aqui](https://we.tl/t-4A7hZBmO02): 

## Descrição Geral da Aplicação:

Esta aplicação foi desenvolvida em WordPress com um tema personalizado, construído a partir do "_starter theme_" Sage (desenvolvido pela Roots), que funciona como um "_boilerplate_" para otimizar e organizar o desenvolvimento de temas no WordPress.

## Tecnologias Utilizadas:
- Blade para a criação das templates;
- Tailwind CSS como framework para estilização;
- Yarn para compilar e gerir os assets do tema;
- Splide.js para o slideshow da galeria de imagens;
- ACF (Advanced Custom Fields) para a criação dos campos personalizados e do tipo de post "Eventos".

## Funcionalidades Principais:
O tema permite que o utilizador personalize todo o conteúdo do website. 
Abaixo estão as principais funcionalidades:

### Homepage:
- __Hero__: Exibe o título e conteúdo da página. A imagem de destaque da página é usada como background desta secção.
- __Galeria__: Um slideshow mostra as imagens inseridas na tab "_Image Slideshow_" localizada no custom field "HP". Podem ser adicionadas várias imagens horizontais que respeitem a proporção 307:196.
- __Listagem de Posts__: Este bloco, com título predefinido "Blog", permite personalização do título e descrição através da tab "_Posts Highlights Block_". Nesta tab, o utilizador também pode selecionar até 6 posts para exibição.
- Através da Homepage e do menu, o utilizador pode aceder aos *eventos* e à *página de pesquisa*

### Páginas Secundárias:
- __Eventos__: Exibe uma lista dos eventos ordenados por data do evento, a partir do mais recente. Estes eventos podem ser editados no post type "Eventos" no menu lateral do backoffice.
- __Blog__: Página com todos os posts também listados na homepage.
- __Pesquisa__: Inclui um formulário de pesquisa e exibe uma lista de posts/páginas do site.
- __404__: Página de erro "Página Não Encontrada" com um formulário de pesquisa.


## Passos de Instalação

1. Clonar o projeto a partir do GitHub:
   ```sh
   git clone https://github.com/spmezzomo/wy-challenge
   ```
2. Criar uma base de dados em seu servidor
3. Importar a base de dados que se encontra na pasta /sql para a base de dados criada
4. Realizar uma migração de URL caso a URL do projeto seja diferente de _wy.test_, utilizando a url "_sua_url/migrate.php_" (__este script não deve ser mantido no projeto após sua utilização por questões de segurança__)
5. Aceder à pasta do tema e execute o comando abaixo para instalar as dependências PHP:
   ```sh
   composer install
   ```
6. Utilizar a versão correta do Node:
   ```sh
   nvm use 21
   ```
7. Instalar as dependências do tema:
   ```sh
   yarn install
   ```
8. Compilar os assets do tema:
```sh
   yarn yarn build
   ```

## Credenciais de Acesso ao Admin:

Após os passos acima cumpridos, já pode-se aceder ao site e ao seu respectivo backoffice (_/my-admin_)

- *User:* admin
- *Pwd:* $UP3RstrongP4$$w0rd
