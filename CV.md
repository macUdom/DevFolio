# UDOM A. I.

Junior Full-Stack Developer | Port Harcourt, Nigeria 07025503931 | sflowgroup@gmail.com | github.com/macUdom

## PROFESSIONAL SUMMARY

Self-driven developer who designed, built and debugged a complete food e-commerce platform, from the database and secure payment flow to a customer storefront and admin dashboard. Comfortable working with modern tools (Vue, Node.js/Express, Supabase, Paystack) and AI-assisted development, and careful about security, testing every feature in the browser and database before moving on. Seeking an entry-level full-stack or front-end role.

## FEATURED PROJECT

**SavorBite: Food E-Commerce Storefront and Admin Dashboard** | 2026 **Stack:** Vue 3, Vite, Tailwind CSS, Node.js, Express, Supabase (PostgreSQL, Auth, Storage), Paystack, Resend, Git/GitHub

- Built a full-stack ordering platform for a Nigerian food business, with a customer storefront (menu, cart, checkout, order history) and an admin dashboard (orders, products, categories, image upload).
- Set up a Supabase PostgreSQL database with tables for profiles, products, categories, orders and order items, plus row-level security policies, a new-user trigger and seed data. Money is stored in kobo to avoid rounding errors.
- Implemented authentication (register, login, session restore, sign out) with role-based access, so admins are routed to the dashboard and customers to the shop.
- Integrated Paystack payments: orders are created with server-calculated totals, customers are redirected to Paystack, and orders are marked paid only after the backend verifies the amount. Added stock reduction on payment and a payment result page that confirms status from the database rather than trusting the redirect.
- Diagnosed and fixed a real payment bug where successful Paystack transactions stayed "Pending", by reading backend logs and tracing a reference mismatch between Paystack and the order record.
- Enforced order status rules (unpaid orders can only be cancelled; paid orders move through Preparing, Out for delivery and Delivered) on both the server and the admin interface.
- Integrated Resend for transactional order-confirmation emails.
- Resolved day-to-day engineering problems: CORS configuration, port conflicts and leftover server processes, missing module exports, blank-page runtime errors (Vue render and import errors), and Windows PowerShell script restrictions.
- Applied secure practices: kept secrets in server-only .env files, used placeholder-only .env.example, configured .gitignore, checked Git commits for leaked keys before pushing, and rotated exposed keys.
## TECHNICAL SKILLS

- **Front end:** Vue 3, Vite, Pinia-style stores, Vue Router, Tailwind CSS, HTML, CSS, JavaScript
- **Back end:** Node.js, Express, REST APIs, middleware, input validation, error handling
- **Database and cloud:** Supabase (PostgreSQL, Auth, Storage), SQL, row-level security
- **Payments and email:** Paystack (initialize, verify, callback, webhooks), Resend
- **Tools:** Git and GitHub, VS Code, browser DevTools, Postman-style API testing, npm, ngrok
- **Practices:** debugging from logs and console errors, secure handling of API keys, step-by-step feature testing, AI-assisted coding with Kilo Code and Claude
## EDUCATION

**Computer Science Student**, Federal University of Technology Owerri (FUTO). Expected graduation: 2029

## REFERENCES

## Available on request.