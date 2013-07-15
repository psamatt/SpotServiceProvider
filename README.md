# SpotServiceProvider

A [Spot](https://github.com/vlucas/Spot) ServiceProvider for [Silex](http://silex.sensiolabs.org)

Spot is a lightweight DataMapper written for PHP5.3+, its really easy to use and perfect for a small application built in Silex

## Usage

### Passing a dsn string

In order to connect to your MySQL database, pass a valid DSN string into the provider

    $app->register(new Psamatt\Silex\SpotServiceProvider('mysql://username:password@localhost/db_name'));
    
In your `index.php`, you can then interact with `Spot` with the following lines:

```
// Find all the posts from the database where the status is 1
$app['spot']->all('Entity\Post', array('status' => 1));
    
// Find one post where the title is Test Post
$app['spot']->first('Entity\Post', array('title' => "Test Post"));
```

For more information on how to use `Spot`, see the [github repository page](https://github.com/vlucas/Spot)

#### Acknowledgement

[Vance Lucas](https://github.com/vlucas)