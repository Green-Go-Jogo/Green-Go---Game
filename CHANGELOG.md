# Foram utilizadas as seguintes documentações para a criação desse arquivo

Para a criação do Changelog foi seguido o modelo [Mantenha um Changelog](https://keepachangelog.com/pt-BR/1.0.0/) junto do [Versionamento Semântico](https://semver.org/lang/pt-BR/)

# [1.0.3] - 10-07-2024
### Adicionado
- Adição da exclusão, edição e alteração de senha do usuário via página de perfil.

# [1.0.2] - 10-07-2024
### Modificado
- Alterado geração do ediotor de texto via node.js, usando das bibliotecas e plugins fornecidos gratuitamente pelo CKEditor.

# [1.0.1] - 05-07-2024
### Modificado
- Modificado exclusão do sistema, agora todos os objetos são excluídos logicamente.

# [1.0.0] - 19-06-2024
### Adicionado
- Adicionado o Sistema de Quiz, incluindo o CRUD de questões, junto da adição de questões a uma planta. Também sendo possivelmente a função quiz durante uma partida, agregando ao conhecimento dos jogadores e aos pontos da equipe.

# [0.5.0] - 19-06-2024
### Modificado e Adicionado
- Front-end de responder o quiz, formulário, página de listagem de questões, entre outras alterações menores
- Verificação do formulário de quiz, possibilidade de não adicionar imagem a uma questão

# [0.4.0] - 13-06-2024
### Adicionado
- Adicionada a pontuação de quiz às telas de equipes e ranking, adicionado às páginas de verEquipe e MainJogo a função de checar se a partida foi finalizada e encaminhar o usuário a página de ranking

# [0.3.0] - 13-06-2024
### Modificado
- Ajustada a exclusão de imagens quando subida nova versão do git, agora as pastas contendo imagens dinâmicas é citada no arquivo .gitignore, não havendo sua alteração em novas versões

# [0.2.0] - 11-06-2024
### Modificado
- Ajustada método de resposta do quiz, além de seu front-end no dark-mode

# [0.1.0] - 10-06-2024
### Modificado
- Ajustada a tela de impressão de etiquetas
- Alterações na montagem da etiqueta

# [0.0.1] - 10-06-2024
### Adicionado
- Início do versionamento semântico, tudo feito até o momento está de forma resumida na lista abaixo. Toda alteração feita a partir desse momento será atualizada neste changelog, seguindo as regras de versionamento semântico, sendo essa a versão 0.0.1, e a próxima a 0.1.0, e seguindo assim por padrão.

##### As seguintes funções foram feitas até o momento:
- CRUD de plantas
- CRUD de espécies
- CRUD de equipes
- CRUD de partidas
- CRUD de zonas
- CRUD de questões
- Função de pontuação 
- Função de quiz 
- Função de partida
- Impressão de etiquetas
