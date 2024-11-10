# wy-challenge-project

Descrição Geral da Aplicação:

Esta aplicação foi desenvolvida em WordPress com um tema personalizado, construído a partir do tema-base Sage (desenvolvido pela Roots), que funciona como um "boilerplate" para otimizar e organizar o desenvolvimento de temas no WordPress.

# Tecnologias Utilizadas:
- Blade para a criação das templates;
- Tailwind CSS como framework para estilização;
- Yarn para compilar e gerir os assets do tema;
- Splide.js para o slideshow da galeria de imagens;
- ACF (Advanced Custom Fields) para a criação dos campos personalizados e do tipo de post "Eventos".

# Funcionalidades Principais:
O tema permite que o utilizador personalize todo o conteúdo do website. 
Abaixo estão as principais funcionalidades:

# Homepage:
- Hero: Exibe o título e conteúdo da página. A imagem de destaque da página é usada como background desta secção.
- Galeria: Um slideshow mostra as imagens inseridas na tab "Image Slideshow" localizada no custom field "HP". Podem ser adicionadas várias imagens horizontais que respeitem a proporção 307:196.
- Listagem de Posts: Este bloco, com título predefinido "Blog", permite personalização do título e descrição através da tab "Posts Highlights Block". Nesta tab, o utilizador também pode selecionar até 6 posts para exibição.

Através da Homepage e do menu, o utilizador pode aceder aos eventos e à página de pesquisa

# Páginas Secundárias:
- Eventos: Exibe uma lista dos eventos ordenados por data do evento, a partir do mais recente. Estes eventos podem ser editados no post type "Eventos" no menu lateral do backoffice.
- Blog: Página com todos os posts também listados na homepage.
- Pesquisa: Inclui um formulário de pesquisa e exibe uma lista de posts/páginas do site.
- 404: Página de erro "Página Não Encontrada" com um formulário de pesquisa.


# Passos de Instalação
- Clonar o projeto a partir do GitHub: git clone https://github.com/spmezzomo/wy-challenge
- Criar uma base de dados em seu servidor.
- Importar a base de dados que se encontra na pasta /sql para a base de dados criada.
- Realizar uma migração de URL caso a URL do projeto seja diferente de wy.test, utilizando a url "sua_url/migrate.php" (este script não deve ser mantido no projeto após sua utilização por questões de segurança)
- Aceda à pasta do tema e execute o comando abaixo para instalar as dependências PHP:

 -- composer install
 -- Utilizar a versão correta do Node:nvm use 21
 -- Instale as dependências do tema: yarn install
 -- Compile os assets do tema: yarn build


# Credenciais de Acesso ao Admin:

Utilizador: admin
Senha: $UP3RstrongP4$$w0rd
