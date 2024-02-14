# Taverna do Gordo API
Essa aplicação é para melhorar a escalabilidade de uma aplicação para RPG de mesa.

**Objetivos:**
- Usar o máximo possível de design patterns visando um código escalável;
- Melhorar a divisão de responsabilidades da aplicação;
- Fazer uma base sólida.

## Rotas
> / [GET]
Página inicial da API, com informações do author e descrição da API;
> /registrar [POST]
Rota para registrar usuários com um JSON contendo o seguinte padrão:
```
{
  "nomeUsuario": "nome-do-usuario",
  "senha": "senha-do-usuario"
}
```

## Dev Logs
**1° Etapa: ✔**
- Entrega do sistema para registrar usuários:
  - Validar nome;
  - Validar senha;
  - Tratamento de erros;
  - Criação da rota para registrar;

**2° Etapa: [EM PROGRESSO]**
- Entrega do sistema de login.
