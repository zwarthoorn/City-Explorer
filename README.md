# Weather Location Explorer

A web application that provides weather information, location mapping, and related photos based on user-entered city names. Built with Laravel and Livewire, this application integrates multiple external services to deliver a comprehensive view of any valid location.

## Features

- Real-time weather information
- Interactive map display
- Location-based photo gallery
- Recent searches history
- Live search updates using Livewire

## Prerequisites

- Docker
- Docker Compose
- PHP 8.2+
- Composer
- Node.js & NPM

## Installation

1. Clone the repository
```bash
git clone [your-repository-url]
cd [project-directory]
```

2. Install dependencies
```bash
composer install
npm install
```

3. Set up environment variables
```bash
cp .env.example .env
```
Configure the following in your `.env` file:
- Database credentials
- Weather API key
- Photo service API key
- Map service credentials

4. Start the application using Laravel Sail
```bash
./vendor/bin/sail up -d
```

5. Run migrations
```bash
./vendor/bin/sail artisan migrate
```

6. Build assets
```bash
./vendor/bin/sail npm run dev
```

## Architecture Overview

### Frontend Architecture
- **Livewire** serves as the primary frontend framework
- Single component design to avoid Livewire parent-child update limitations
- Tailwind CSS for styling
- AI-assisted frontend development for HTML/CSS structure

### Backend Architecture
The application follows a service-oriented architecture with clear separation of concerns:

#### Service Layer Design
```
services/
├── HttpRequester.php
├── WeatherBaseService.php
├── WeatherApiService.php
├── PhotoBaseService.php
├── PhotoApiService.php
├── MapBaseService.php
└── MapApiService.php
```

### Design Choices & Trade-offs

#### Service Architecture
**Advantages:**
- Clear separation of domains
- Reusable HTTP request logic
- Easy to maintain and extend
- Microservice-ready architecture
- Isolated authentication per service

**Disadvantages:**
- More complex file structure
- Potential over-engineering for smaller features
- Additional technical depth

#### Single Livewire Component
**Rationale:** Due to Livewire's limitations with parent-child component updates, a single component approach was chosen to ensure reliable state management.

**Alternative Approach:** The application could be refactored to use multiple components with:
- Extracted search logic
- Polling mechanism for child components
- Event-based updates

#### Map Integration
Custom map solution implemented due to:
- Google Maps API requiring billing information
- Mapbox account creation issues

## External Services

The application integrates with the following services:
- Weather API for meteorological data
- Photo service for location-based images
- Map service for location visualization

Each service integration is encapsulated in its own service class with:
- Base service for authentication
- Specific endpoint services for API calls
- Common HTTP requester for standardized API communication

## Future Improvements

1. Component Refactoring
    - Split into multiple Livewire components
    - Implement proper state management
    - Add polling mechanism for updates

2. Service Optimizations
    - Cache frequent API calls
    - Implement rate limiting
    - Add failure recovery mechanisms

3. Frontend Enhancements
    - Add loading states
    - Improve error handling
    - Enhanced mobile responsiveness

