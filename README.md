#Service d'envoi de mail pour Symfony 2

Déclarer le service dans config.yml ou services.yml selon votre configuration:

    app.mail:
        class:  App\MonBundle\Services\Mailer
        arguments: [@mailer,@templating]

Exemple d'utilisation dans MonController.php.

#Service Send Email in Symfony 2

Configure your application's security.yml:

    app.mail:
        class:  App\MonBundle\Services\Mailer
        arguments: [@mailer,@templating]

  Example to use in MonController.php
