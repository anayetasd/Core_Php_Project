
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garments Widget</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h3 class="text-center">Latest Arrivals</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= asset(); ?>/dist/img/images.jpeg" class="card-img-top" alt="Product 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Stylish Shirt</h5>
                        <p class="card-text">Price: $30</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= asset(); ?>/dist/img/anayet2.jpeg" class="card-img-top" alt="Product 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Denim Jacket</h5>
                        <p class="card-text">Price: $50</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= asset(); ?>/dist/img/anayet3.jpeg" class="card-img-top" alt="Product 3">
                    <div class="card-body text-center">
                        <h5 class="card-title">Casual Trousers</h5>
                        <p class="card-text">Price: $40</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center mt-5">Discount Offers</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-warning text-dark text-center">
                    <div class="card-body">
                        <h5 class="card-title">Summer Sale</h5>
                        <p class="card-text">Get up to 50% off on selected items!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-danger text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Limited Time Offer</h5>
                        <p class="card-text">Buy 2 get 1 free on all shirts!</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center mt-5">Best Sellers</h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= asset(); ?>/dist/img/anayet4.jpeg" class="card-img-top" alt="Bestseller 1">
                    <div class="card-body text-center">
                        <h5 class="card-title">Leather Jacket</h5>
                        <p class="card-text">Price: $120</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= asset(); ?>/dist/img/anayet9.jpeg" class="card-img-top" alt="Bestseller 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Formal Suit</h5>
                        <p class="card-text">Price: $200</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= asset(); ?>/dist/img/anayet8.jpeg" class="card-img-top" alt="Bestseller 2">
                    <div class="card-body text-center">
                        <h5 class="card-title">Formal Suit</h5>
                        <p class="card-text">Price: $200</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center mt-5">Customer Reviews</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">"Amazing quality and fast delivery!" - John</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">"Perfect fit, loved the material." - Sarah</p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center mt-5">Newsletter Subscription</h3>
        <div class="text-center">
            <input type="email" class="form-control w-50 d-inline" placeholder="Enter your email">
            <button class="btn btn-primary mt-2">Subscribe</button>
        </div>
    </div>
</body>
</html>
