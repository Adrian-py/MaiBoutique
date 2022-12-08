# Database Architecture

1. User

-   Username
-   Email
-   Password
-   Phone Number
-   Address
-   Role (Member / Admin)

2. Product

-   Name
-   Price
-   Description
-   Image

3. Cart

-   user_id

4. CartDetail

-   cart_id
-   product_id
-   Quantity

4. Transaction

-   user_id

5. TransactionDetail

-   transaction_id
-   product_id
-   Quantity

Setiap register buat table User, Cart, dan Transaction.
