<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>One Team Календарь Генератор</title>
  </head>
  <body>
    <div class="container vh-100">
        <div class="row align-items-center py-4">
            <h5>Генерация календаря футбольного чемпионата на один сезон</h5>
            <form action="#" method="POST" id="generate-form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="teamsFile" class="form-label">Загрузите список команд (в формате json)</label>
                    <input class="form-control" type="file" id="teamsFile" name="teamsFile">
                </div>
                <button type="button" id="sendDataBtn" name="sendDataBtn" class="btn btn-primary">Снегерировать</button>
            </form>
            <div class="alert alert-danger my-1" id="errorMessage" style="display: none;"></div>
        </div>
        <div style="display: none;" class="table">
            <h1 class="display-6">Календарь матчей</h1>
            <div>
                <p class="text-success h5">Тур 1</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Хозяева</th>
                            <th scope="col">---</th>
                            <th scope="col">Гости</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Лестер Сити</td>
                            <td>###</td>
                            <td>Ливерпул</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <p class="text-success h5">Тур 2</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Хозяева</th>
                            <th scope="col">---</th>
                            <th scope="col">Гости</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Лестер Сити</td>
                            <td>###</td>
                            <td>Ливерпул</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>