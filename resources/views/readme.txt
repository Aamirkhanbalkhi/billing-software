
Project Name: gst-billing
Laravel version: 7

HTML pages convert to BLADE files
Create Login page also (home page)
From login > Dashboard

Public Invoice Page
URL: localhost:8000/gst-billing/create-invoice

Bank detail in Create Invoice

Bank detail: Zip code, State

Remove: TAX, Net Amount, Declaration
Rupees symbol, before amount (only on display)

Tables

1. users
2. user_type (total 4)
3. bank_accounts (with user_id)
4. vendor_invoices (with user_id and bank_account_id)
