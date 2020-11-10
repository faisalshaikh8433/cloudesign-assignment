- Product listing page with only **admin can view, create, edit, delete** feature.
- Repository pattern for the **Product model**.
- Includes two unit tests and one feature test.
  - Unit tests:
    - **user is not admin**
    - **user is admin**
  - Feature tests:
    - **only the admin can view a product**
- For setting up a database with dummy data run **php artisan migrate:refresh --seed**.
- Products and two users are created one admin and another normal.
  - email1: **admin@gmail.com**
  - email2: **normal@gmail.com**
  - password : **password**
- run test using **php artisan test**
