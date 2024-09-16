# Symfony Issue Reproduction

This README outlines the steps to set up a Symfony project and reproduce the issue described in [symfony/symfony#57902](https://github.com/symfony/symfony/issues/57902).

## Setup

To create the project I took the following steps:

1. Create a new Symfony 6.4 project using the Symfony CLI
2. Install monolog (`composer require monolog`)
3. Applied the production monolog configuration to @dev
4. Created a controller that highlights the issue

## Reproducing the Issue

Run the project

```
symfony serve
```

1. Go to http://127.0.0.1:8000/stream/no-issue, notice the logs
![image](https://github.com/user-attachments/assets/da265a2d-6218-4ebe-8c9d-95dab6541093)

2. Go to http://127.0.0.1:8000/stream/issue, notice the logs
![image](https://github.com/user-attachments/assets/264ca074-43d6-4ca1-bd1c-acd679747fd7)

In the second request, the fingers_crossed handler did not include the 404 error from the logs.