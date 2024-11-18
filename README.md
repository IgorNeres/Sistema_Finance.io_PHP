# PROJETO CRUD(FitPlanner)
<div align="center">
<img src="https://github.com/user-attachments/assets/4d82aa8b-31fc-4707-8178-8b27c41d0852" width="700px"/>
</div>


## SOBRE O PROJETO
O projeto consiste em um sistema web de gestão de treinos para personais trainers, desenvolvido em PHP, com as funcionalidades CRUD(Create, Read, Update e Delete). O sistema oferece telas de logins tanto para personais, quantos para seus respectivos clientes. As funcionalidades fornecidas para os personais são as de cadastrar um aluno, criar seu treino, visualizar, editar e excluir seus alunos, os alunos podem acessar sua conta e ter acesso ao treino disponibilizado por seu personal.

Além disso, para facilitar a avaliação dos personais quantos ao seus dias de trabalho, o sistema conta com um gráfico interativo que permite o personal ter acesso aos dias da semana com mais recorrência de treinos. Desse modo, pode-se extrair dados relevantes para a adaptação dos dias de treino de cada aluno, fazendo assim com que cada personal possa adaptar sua rotina de trabalho, a fim de conseguir um melhor atendimento e atenção para cada um de seus alunos.

## FUNCIONALIDADES ✅
- **Cadastro, edição e exclusão**: Os personais podem adicionar novos alunos ao sistema, junto com todas as informações de login e fornecê-las aos seus alunos, atualizar dados de seus clientes e removê-los quando necessário.
- **Visualização de treino**: Os alunos com seus logins disponibilizados por seus personais tem acesso a seus treinos atuais cadastrados no sistema.
- **Sistema de login e controle de sessões**: O acesso ao sistema é protegido por sistema de login, que utiliza de sessões PHP para garantir que apenas usuários cadastrados possam ter acesso as suas informações.
- **Proteção contra SQL INJECTION**: A aplicação no sistema de login, conta com o uso da função mysqli_real_scape_string(), a qual serve para limpar a string que, no caso, será enviada ao banco de dados. Essa função ajuda na prevenção de SQL Injection, pois não deixa que alguns caracteres como \n, ', ", entre outros quebrem sua query ou mesmo cheguem no seu BD e assim cause algum estrago.
- **Google Charts para gráfico interativo**: O sistema usa da API do Google para criar um gráfico dinâmico para os personais mostrando os dias com maior frequência de treino, assim possibilitando uma análise dos dados por parte do personal para melhoria do seu trabalho.
- **Interface responsiva**: Todo a estilização do sistema deu-se pela utilização do framework Bootstrap, assim garantindo uma boa experiência gráfica para os usuários, além da sua adaptação para todos os dispositivos.

## TECNOLOGIAS UTILIZADAS 🔧
- **PHP**: linguagem de progamação utilizada para a construção lógica do sistema.
- **MySQL**: Banco de dados utilizado para armazenar os dados de personais e clientes.
- **Bootstrap**: Framework CSS utilizado para estilização da aplicação.
- **Google Charts**: Biblioteca JavaScript utilizada para criação dos gráficos interativos a partir do dados dos usuários.

## MODELAGEM DE DADOS 🗃️
Ressalta-se que o projeto foi realizado desde o início passando pelas três etapas da modelagem de dados:
1. **Modelo Conceitual**: Definer as entidades e relacionamentos(disponível na pasta modelagem de dados);
2. **Modelo Lógico**: Detalhamento das tabelas envolvidas, campos e relacionamentos; 
3. **Modelo Físico**: Criação concreta do banco de dados no MySQL, com a implementação das tabelas e índices a fim de melhorar o desempenhos nas consultas.

## CONSULTAS SQL UTILIZADAS 🔎
```SQL
INSERT INTO cliente (id_personal, email, senha, nome, dia1_c, dia2_c, dia1_b, dia2_b, dia1_t, dia2_t, dia1_p, dia2_p,
 dia1_pe, dia2_pe, dia1_o, dia2_o, exec1, exec2, exec3, exeb1, exeb2, exeb3, exet1,exet2, exet3, exep1, exep2, exep3,
 exeo1, exeo2, exepe1, exepe2, exepe3, exepe4, exepe5, exepe6)
VALUES ($idpersonal, '$email', '$senha', '$nome', '$dia1c', '$dia2c', '$dia1b', '$dia2b', '$dia1t', '$dia2t', '$dia1p',
 '$dia2p', '$dia1pe','$dia2pe', '$dia1o', '$dia2o', '$exc1', '$exc2', '$exc3', '$exb1', '$exb2', '$exb3', '$ext1',
 '$ext2', '$ext3', '$exp1', '$exp2', '$exp3','$exo1', '$exo2', '$expe1', '$expe2', '$expe3', '$expe4', '$expe5', '$expe6')"
```
```SQL
UPDATE cliente SET email = '$email', nome = '$nome', dia1_c = '$dia1c', dia2_c = '$dia2c', dia1_b = '$dia1b',
 dia2_b = '$dia2b', dia1_t = '$dia1t', dia2_t = '$dia2t', dia1_p = '$dia1p', dia2_p = '$dia2p', dia1_pe = '$dia1pe',
 dia2_pe = '$dia2pe', dia1_o = '$dia1o', dia2_o = '$dia2o', exec1 = '$exc1', exec2 = '$exc2', exec3 = '$exc3',
 exeb1 = '$exb1', exeb2 = '$exb2', exeb3 = '$exb3', exet1 = '$ext1',exet2 = '$ext2', exet3 = '$ext3',
 exep1 = '$exp1', exep2 = '$exp2', exep3 = '$exp3', exeo1 = '$exo1', exeo2 = '$exo2', exepe1 = '$expe1',
 exepe2 = '$expe2', exepe3 = '$expe3', exepe4 = '$expe4', exepe5 = '$expe5', exepe6 = '$expe6';
```

```SQL
DELETE FROM cliente WHERE id = '$aluno_id';
```

```SQL
SELECT * FROM cliente WHERE id='$aluno_id'
```

```SQL
SELECT dia_da_semana, COUNT(*) AS frequencia
FROM (
    SELECT dia1_b AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia1_b <> ''
    UNION ALL
    SELECT dia2_b AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia2_b <> ''
    UNION ALL
    SELECT dia1_t AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia1_t <> ''
    UNION ALL
    SELECT dia2_t AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia2_t <> ''
    UNION ALL
    SELECT dia1_c AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia1_c <> ''
    UNION ALL
    SELECT dia2_c AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia2_c <> ''
    UNION ALL
    SELECT dia1_p AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia1_p <> ''
    UNION ALL
    SELECT dia2_p AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia2_p <> ''
    UNION ALL
    SELECT dia1_o AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia1_o <> ''
    UNION ALL
    SELECT dia2_o AS dia_da_semana FROM cliente WHERE id_personal = $id_personal AND dia2_o <> ''
) AS dias_unificados
GROUP BY dia_da_semana
ORDER BY frequencia DESC;
```

```SQL
SELECT * FROM cliente WHERE email = '$email' LIMIT 1
```

```SQL
SELECT * FROM personal WHERE email = '$email' AND senha = '$senha'
```

```SQL
$sql .= ", senha='" . password_hash($senha, PASSWORD_DEFAULT) . "'";
```

```SQL
SELECT * FROM cliente WHERE id='$cliente_id'
```

```SQL
SELECT * FROM cliente WHERE id_personal = '$id'
```

## IMAGENS DO SISTEMA 📷
<div align="center">
<h4>Tela de login</h4>
<img src="https://github.com/user-attachments/assets/1be12283-115f-4e37-a7ec-7ae3ed9e4725" width="900px"/>
<h4>Tela Personal</h4>
<img src="https://github.com/user-attachments/assets/97bc7144-4dba-434e-84bf-950c0972c788" width="900px"/>
<h4>Tela Estatísticas</h4>
<img src="https://github.com/user-attachments/assets/9f686e67-cd9e-4ad9-b6f2-4a19b6cc73ee" width="900px"/>
<h4>Cadastro de Aluno</h4>
<img src="https://github.com/user-attachments/assets/3d846215-30c5-4327-9309-c27a409ffbc6" width="900px"/>
<h4>Tela Aluno</h4>
<img src="https://github.com/user-attachments/assets/6aba0a02-3227-4553-bbab-3d4687536041" width="900px"/>
</div>




