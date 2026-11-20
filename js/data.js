/**
 * T.M. Hotel, Madurai — Grounded Business & Hospitality Data
 * Address: 50, West Perumal Maistry Street, Madurai - 625001
 */

window.TM_HOTEL_DATA = {
  property: {
    name: 'T.M. Hotel',
    group: 'T.M. Group of Companies',
    founded: 1950,
    totalRooms: 57,
    address: '50, West Perumal Maistry Street, Madurai Main, Madurai - 625001, Tamil Nadu, India',
    phones: ['+91 7708681651', '+91 452 2341651'],
    whatsapp: '917708681651',
    emails: ['reservations@tmhotel.in', 'tmhotelmadurai@gmail.com'],
    checkIn: '12:00 PM',
    checkOut: '11:00 AM',
    promoCode: 'TM1950',
    promoDiscountRate: 0.10,
    gstRate: 0.12
  },

  rooms: [
    {
      id: 'deluxe-double',
      category: 'deluxe',
      pageUrl: 'deluxe-room.php',
      badge: 'Guest Favorite',
      name: 'Deluxe Double A/C',
      size: '204 sq. ft.',
      occupancy: '2 Adults (+1 Child)',
      bed: 'Plush Queen / Double Bed',
      rate: 2150,
      image: 'assets/images/deluxe-room.jpg',
      shortDesc:
        'Thoughtfully appointed air-conditioned sanctuary with crisp cotton linens, blackout curtains, and Madurai city views just steps from the Junction.',
      fullDesc:
        'Designed for pilgrims, business travelers, and families seeking calm comfort in the bustling heart of Madurai. Features individually controlled air-conditioning, 32-inch LED satellite television, high-speed complimentary Wi-Fi, and 24-hour hot & cold water.',
      amenities: [
        'Individually Controlled A/C',
        '32" LED Satellite TV',
        'Complimentary High-Speed Wi-Fi',
        '24-Hr Hot & Cold Water',
        'Blackout Curtains',
        '24-Hr Room Service'
      ]
    },
    {
      id: 'executive-double',
      category: 'executive',
      pageUrl: 'executive-room.php',
      badge: 'Spacious Upgrade',
      name: 'Executive Double A/C',
      size: '228 sq. ft.',
      occupancy: '2–3 Guests',
      bed: 'Signature King / Twin Bedding',
      rate: 2650,
      image: 'assets/images/executive-room.jpg',
      shortDesc:
        'Elevated boutique proportions with teakwood workspace, upgraded furnishings, and serene ambiance ideal for extended Madurai stays.',
      fullDesc:
        'Our Executive Double A/C rooms offer extra living space, a dedicated writing desk for business travelers, warm ambient lighting, daily housekeeping, complimentary bottled water, and priority travel desk assistance.',
      amenities: [
        '228 sq. ft. Corner Layout',
        'Executive Work Desk',
        'High-Speed Wi-Fi',
        '32" LED Satellite TV',
        'Daily Housekeeping',
        'Laundry & Travel Desk Access'
      ]
    },
    {
      id: 'executive-terrace',
      category: 'terrace',
      pageUrl: 'executive-room.php',
      badge: 'Temple Horizon',
      name: 'Executive Terrace Temple-View',
      size: '240 sq. ft. + Terrace',
      occupancy: '2–3 Guests',
      bed: 'King Bed + Private Sit-Out',
      rate: 3100,
      image: 'assets/images/terrace-view.jpg',
      shortDesc:
        'Select top-floor Executive rooms featuring private terrace seating overlooking Madurai rooftops and distant Meenakshi Temple gopuram silhouettes.',
      fullDesc:
        'Wake up to morning temple bells and unwind at dusk on your private terrace. Combines all Executive Double A/C comforts with open-air city views toward the Meenakshi Amman Temple towers.',
      amenities: [
        'Private City-View Terrace',
        'Distant Temple Gopuram Views',
        'King Plush Bedding',
        '24-Hr Room Service',
        'High-Speed Wi-Fi',
        'Early Darshan Travel Assistance'
      ]
    }
  ],

  landmarks: [
    {
      id: 'tm-hotel',
      name: 'T.M. Hotel (Your Stay)',
      distance: '0 m',
      time: 'Central Hub',
      category: '50, West Perumal Maistry St',
      mapQuery: 'T.M. Hotel, 50 West Perumal Maistry Street, Madurai, Tamil Nadu 625001',
      tip: 'Located in the heart of Madurai Main — step out directly toward Madurai Junction, Periyar Bus Stand, and Meenakshi Temple.'
    },
    {
      id: 'bus-stand',
      name: 'Periyar Central Bus Stand',
      distance: '350 m',
      time: '2 min walk',
      category: 'Transit Hub',
      mapQuery: 'Periyar Bus Stand, Madurai, Tamil Nadu',
      tip: 'Effortless arrival for intercity travelers arriving from across Tamil Nadu—walk straight to West Perumal Maistry Street.'
    },
    {
      id: 'railway',
      name: 'Madurai Railway Junction',
      distance: '650 m',
      time: '2–4 min walk',
      category: 'Rail Gateway',
      mapQuery: 'Madurai Junction Railway Station, Madurai, Tamil Nadu',
      tip: 'Located virtually opposite Madurai Junction—ideal for late-night or early-morning train arrivals without expensive cab fares.'
    },
    {
      id: 'meenakshi',
      name: 'Meenakshi Amman Temple',
      distance: '700 m',
      time: '5–8 min walk',
      category: 'Sacred Heritage',
      mapQuery: 'Meenakshi Amman Temple, Madurai, Tamil Nadu',
      tip: 'Stroll to the West or South Gopuram for early morning Vishwaroopa Darshan and evening temple ceremonies without parking stress.'
    },
    {
      id: 'dining-walk',
      name: 'Murugan Idli & Sree Sabarees',
      distance: '450 m',
      time: '4 min walk',
      category: 'Madurai Culinary',
      mapQuery: 'Murugan Idli Shop, West Masi Street, Madurai, Tamil Nadu',
      tip: 'Steps from iconic vegetarian Madurai dining, crisp dosas, traditional filter coffee, and famous Madurai Jigarthanda spots.'
    },
    {
      id: 'mahal',
      name: 'Thirumalai Nayakkar Mahal',
      distance: '1.8 km',
      time: '8 min drive',
      category: 'Royal Architecture',
      mapQuery: 'Thirumalai Nayakkar Mahal, Madurai, Tamil Nadu',
      tip: 'Visit the 17th-century Indo-Saracenic palace and its evening Sound & Light Show—our travel desk arranges instant autos or cabs.'
    },
    {
      id: 'airport',
      name: 'Madurai International Airport',
      distance: '11.9 km',
      time: '25 min drive',
      category: 'Air Connectivity',
      mapQuery: 'Madurai International Airport, Tamil Nadu',
      tip: 'Pre-booked airport pick-up and drop-off transfers available 24/7 through the T.M. Hotel Travel Desk.'
    }
  ],

  sightseeing: [
    {
      id: 'ss-meenakshi',
      category: 'temples',
      categoryLabel: 'Sacred Temple',
      name: 'Meenakshi Amman Temple',
      distance: '800 m Distance from T.M Hotel',
      driveTime: '5 min walk',
      image: 'assets/images/sightseeing/meenakshi.jpg',
      description: 'World-renowned Dravidian architectural marvel with towering gopurams and the Hall of a Thousand Pillars.',
      query: 'Meenakshi Amman Temple Madurai',
      accent: 'brass',
      iconType: 'gopuram'
    },
    {
      id: 'ss-theppakulam',
      category: 'heritage',
      categoryLabel: 'Sacred Tank',
      name: 'Mariamman Theppakulam',
      distance: '4.7 km Distance from T.M Hotel',
      driveTime: '15 min drive',
      image: 'assets/images/sightseeing/theppakulam.jpg',
      description: 'Historic 17th-century temple tank famous for the illuminated Teppam Float Festival and tranquil evening walks.',
      query: 'Vandiyur Mariamman Teppakulam Madurai',
      accent: 'indigo',
      iconType: 'tank'
    },
    {
      id: 'ss-alagar',
      category: 'temples',
      categoryLabel: 'Hill Temple',
      name: 'Alagar Kovil Temple',
      distance: '15 km Distance from T.M Hotel',
      driveTime: '35 min drive',
      image: 'assets/images/sightseeing/alagar-kovil.jpg',
      description: 'Ancient Vishnu shrine nestled in the lush Alagar Hills, revered during the grand Chithirai Festival.',
      query: 'Alagar Kovil Temple Madurai',
      accent: 'terracotta',
      iconType: 'hill'
    },
    {
      id: 'ss-nayakar',
      category: 'heritage',
      categoryLabel: 'Royal Palace',
      name: 'Thirumalai Nayakar Mahal',
      distance: '1.7 km Distance from T.M Hotel',
      driveTime: '7 min drive',
      image: 'assets/images/sightseeing/thirumalai-nayakar.jpg',
      description: '1636 Indo-Saracenic palace celebrated for colossal stucco pillars, royal courtyard, and evening Sound & Light show.',
      query: 'Thirumalai Nayakkar Mahal Madurai',
      accent: 'brass',
      iconType: 'palace'
    },
    {
      id: 'ss-adhisayam',
      category: 'family',
      categoryLabel: 'Theme Park',
      name: 'Adhisayam Theme Park',
      distance: '12 km Distance from T.M Hotel',
      driveTime: '28 min drive',
      image: 'assets/images/sightseeing/adhisayam.jpg',
      description: 'Popular family water and amusement park along the Madurai–Dindigul highway with thrilling rides and wave pools.',
      query: 'Athisayam Water Park Madurai',
      accent: 'sage',
      iconType: 'park'
    },
    {
      id: 'ss-gandhi',
      category: 'family',
      categoryLabel: 'Museum',
      name: 'Gandhi Memorial Museum',
      distance: '4.1 km Distance from T.M Hotel',
      driveTime: '14 min drive',
      image: 'assets/images/sightseeing/gandhi-museum.jpg',
      description: 'Historic Tamukkam Palace housing rare artifacts, letters, and chronicles of India’s independence movement.',
      query: 'Gandhi Memorial Museum Madurai',
      accent: 'indigo',
      iconType: 'museum'
    },
    {
      id: 'ss-thirupparamkundram',
      category: 'temples',
      categoryLabel: 'Arupadai Veedu',
      name: 'Thirupparamkundram',
      distance: '7.0 km Distance from T.M Hotel',
      driveTime: '20 min drive',
      image: 'assets/images/sightseeing/thirupparamkundram.jpg',
      description: 'One of Lord Murugan’s Six Sacred Abodes, carved into a striking granite hillock with Pandya rock-cut shrines.',
      query: 'Thiruparankundram Murugan Temple Madurai',
      accent: 'terracotta',
      iconType: 'gopuram'
    },
    {
      id: 'ss-pazhamuthircholai',
      category: 'temples',
      categoryLabel: 'Arupadai Veedu',
      name: 'Pazhamuthircholai Murugan Temple',
      distance: '7.0 km Distance from T.M Hotel',
      driveTime: '25 min drive',
      image: 'assets/images/sightseeing/pazhamuthircholai.jpg',
      description: 'Serene forested hill shrine dedicated to Lord Murugan and Nupura Ganga spring, paired with Alagar Kovil visits.',
      query: 'Pazhamudircholai Murugan Temple Madurai',
      accent: 'sage',
      iconType: 'hill'
    }
  ],

  gallery: [
    {
      id: 'g1',
      category: 'architecture',
      title: 'Grand Lobby & Heritage Entrance',
      image: 'assets/images/hero-hotel.jpg'
    },
    {
      id: 'g2',
      category: 'rooms',
      title: 'Deluxe Double A/C Sanctuary',
      image: 'assets/images/deluxe-room.jpg'
    },
    {
      id: 'g3',
      category: 'rooms',
      title: 'Executive Double A/C Suite',
      image: 'assets/images/executive-room.jpg'
    },
    {
      id: 'g4',
      category: 'views',
      title: 'Twilight Terrace & Gopuram Horizon',
      image: 'assets/images/terrace-view.jpg'
    },
    {
      id: 'g5',
      category: 'views',
      title: 'Evening Balcony Ambience',
      image: 'assets/images/executive-room.jpg'
    },
    {
      id: 'g6',
      category: 'architecture',
      title: 'Warm Teak & Brass Hospitality',
      image: 'assets/images/hero-hotel.jpg'
    }
  ],

  testimonials: [
    {
      quote:
        'Unbeatable convenience right near Madurai Junction and just a calm walk to Meenakshi Amman Temple. Clean, crisp linens and genuinely helpful front-desk assistance at 5 AM for our darshan.',
      author: 'Karthik Subramanian',
      location: 'Chennai • Family Pilgrimage Stay',
      rating: 5
    },
    {
      quote:
        'As a frequent business visitor to Madurai, having 57 reliable A/C rooms, strong Wi-Fi, 24-hour room service, and instant rail connectivity saves hours every trip.',
      author: 'Ananya Krishnan',
      location: 'Bengaluru • Executive Double Guest',
      rating: 5
    },
    {
      quote:
        'The heritage trust of the T.M. Group since 1950 shows in their hospitality. The terrace views at sunset and nearby Murugan Idli breakfast walk made our weekend memorable.',
      author: 'Raghavendra Rao',
      location: 'Hyderabad • Executive Terrace Stay',
      rating: 5
    }
  ],

  faqs: [
    {
      q: 'What are the Check-In, Check-Out & Early Arrival policies?',
      a: 'Standard Check-in time is 12:00 PM (Noon) and Check-out time is 11:00 AM. Early check-in or late check-out is subject to room availability, may require prior intimation, and can be chargeable directly by the hotel.'
    },
    {
      q: 'What Identity Proof is required at Check-In?',
      a: 'Guests must carry a valid government-issued photo identity and address proof (Aadhaar, Passport, Driving License, or Voter ID). Please note that PAN Card is not accepted as a valid ID proof. If booked online by card, the cardholder must be one of the travelers.'
    },
    {
      q: 'What is the Cancellation & Date Amendment Policy?',
      a: 'Cancellations made 15 days or more before check-in are free (full refunds may incur an approx. 5.7% payment processing deduction). Cancellations 7 to 15 days prior incur a 1-night tariff charge, and 0 to 7 days prior (or No-Show) incur 100% of the booking charge. Date amendments are treated as cancellations.'
    },
    {
      q: 'How are Room Tariffs, GST & Bill Settlements handled?',
      a: 'Published tariffs are inclusive of GST; meals and extra services are charged separately. Bills must be settled upon check-out via cash, debit/credit card, or approved online transfer (personal cheques are not accepted for OTA bookings). Management retains a lien on guest luggage in the event of payment default.'
    },
    {
      q: 'How close is T.M. Hotel to Madurai Junction, Periyar Bus Stand & Meenakshi Temple?',
      a: 'Located at 50, West Perumal Maistry Street right opposite Madurai Railway Junction (~650m, 2-minute walk) and Central Bus Stand – Periyar (~350m), a 5-minute walk from Meenakshi Amman Temple (~700m), and 11.9 km from Madurai International Airport.'
    }
  ]
};
