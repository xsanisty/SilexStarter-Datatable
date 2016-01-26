# SilexStarter-Datatable
A datatable module for SilexStarter to provide backend for jquery-datatable library (http://datatable.net)

##Installation
- Add this repository and the following package to your composer.json

```
"repositories" : [
    {
        "type" : "vcs",
        "url" : "https://github.com/xsanisty/EloquentDataTable"
    },
    {
        "type" : "vcs",
        "url" : "https://github.com/xsanisty/SilexStarter-Datatable"
    }
],
"requires" : {
    "xsanisty/silexstarter-datatable" : "^1.0"
}
```

- Register the module provider on ```app/config/modules.php```

```
return [
    //...
    "Xsanisty\Datatable\DatatableModule",
    //...
]

##Usage

- on client side (template), load the datatable script and stylesheet

```
{% block stylesheet %}
    {{parent()}}

    {{ stylesheet([
        '@silexstarter-datatable/css/dataTables.bootstrap.css',
        '@silexstarter-datatable/css/responsive.bootstrap.min.css'
    ]) }}
{% endblock %}

{% block javascript %}
    {{parent()}}

    {{ javascript([
        '@silexstarter-datatable/js/jquery.dataTables.min.js',
        '@silexstarter-datatable/js/dataTables.bootstrap.min.js',
        '@silexstarter-datatable/js/dataTables.responsive.min.js'
    ]) }}
{% endblock %}
```

- on the server side, you can build datatable response by simply using datatable shortcut

```
$datatable = Datatable::of(User::where('id', '<>', $my->id))
    ->setColumn(['profile_pic', 'first_name', 'last_name', 'email', 'activated', 'last_login', 'id'])
    ->setFormatter(
        function ($row) {
            /* do something with the row */
            return [
                $row->id,
                $row->field
                /* etc */
            ];
        }
    )
    ->make();

return Response::json($datatable);
```