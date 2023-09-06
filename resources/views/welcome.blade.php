<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Calculate</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <select class="form-control form-control-lg" id="point_list_from" name="point_from">
                    <option selected disabled value="1" >Кладр откуда везем</option>
                </select>
              </li>
              <li class="list-group-item">
                <select class="form-control form-control-lg" id="point_list_to" name="point_to">
                    <option selected disabled value="1" >Кладр куда везем</option>
                </select>
              </li>
              <li class="list-group-item">
                <select class="form-control form-control-lg" id="delivery" name="delivery">
                    <option selected value="0">Медленная доставка</option>
                    <option value="1">Быстрая доставка</option>
                </select>
              </li>
              <li class="list-group-item">
                <div class="form-group">
                    <label >Вес отправления в кг</label>
                    <input type="number" class="form-control" min="1" id="weight_kg" value="1">
                  </div>
              </li>
              <li class="list-group-item text-center">
                <button class="btn" onclick="calc_delivery()">Расчета стоимости доставки</button>
              </li>
              <li class="list-group-item text-center">
                <p>стоимость: <span id="calc_price"></span></p>
                <p>дата доставки: <span id="calc_date"></span></p>
              </li>
            </ul>
          </div>
    </div>
    <script src="/js/point.js"></script>
</body>
</html>
