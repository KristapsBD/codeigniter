### Requirements

- Docker & Docker Compose
- Git

### Setup

1. Clone repository

2. .env included in repo (of course, this would never be pushed in prod)

3. Start containers:
   ```bash
   make up
   ```

4. Run migrations:
   ```bash
   make shell
   php index.php migrate
   ```

5. Access the application:
   - URL: http://localhost:8080
   - Default accounts:
     - Admin: `admin` / `admin`
     - User: `user` / `user`

## Common Commands

```bash
make up          # Start containers
make down        # Stop containers
make logs        # View container logs
make shell       # Open shell in web container
make db          # Connect to MySQL database
make recreate    # Rebuild and restart containers
```