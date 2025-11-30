import banner1 from "../assets/banner1nep.jpeg";
import banner2 from "../assets/banner2nep.png";
import banner3 from "../assets/banner3nep.png";
import banner4 from "../assets/banner4nep.png";
import m1 from "../assets/m1.png";
import m2 from "../assets/m2.png";
import m3 from "../assets/m3.png";
import m4 from "../assets/m4.png";
import m5 from "../assets/m5.png";
import m6 from "../assets/m6.png";
import m7 from "../assets/m7.png";
import m8 from "../assets/m8.png";
import m9 from "../assets/m9.png";
import m10 from "../assets/m10.png";
import m11 from "../assets/m11.avif";
import m12 from "../assets/m12.avif";
import e1 from "../assets/e1.avif";
import e2 from "../assets/e2.avif";
import e3 from "../assets/e3.avif";
import e4 from "../assets/e4.avif";
import e5 from "../assets/e5.avif";
import inox from "../assets/inox.avif";
import pvr from "../assets/pvr.avif";
import cinepolis from "../assets/cinepolis.avif";

export const languages = [
  "Hindi",
  "English",
  "Nepali",
];

export const banners = [banner1, banner2, banner3, banner4];

export const buses = [
  {
    id: 1,
    title: "Sajha Yatayat",
    genre: "City Bus / Public Transport",
    rating: 4.5,
    votes: "12.3K",
    img: m1,
    promoted: true,
  },
  {
    id: 2,
    title: "Deluxe Pokhara Express",
    genre: "Tourist Bus / Long Route",
    rating: 4.8,
    votes: "8.7K",
    img: m2,
    promoted: true,
  },
  {
    id: 3,
    title: "Araniko Highway Express",
    genre: "Long Route / Mountain Highway",
    rating: 4.6,
    votes: "5.2K",
    img: m3,
  },
  {
    id: 4,
    title: "Everest Deluxe Night Coach",
    genre: "Night Bus / Premium Service",
    rating: 4.9,
    votes: "9.1K",
    img: m4,
  },
  {
    id: 5,
    title: "Lumbini Tourist Coach",
    genre: "AC Tourist / Intercity",
    rating: 4.7,
    votes: "6.4K",
    img: m5,
  },
];


export const allBus = [
  {
    id: 1,
    title: "Sajha Yatayat",
    genre: "City Bus / Public Transport",
    rating: 4.5,
    votes: "12.3K",
    img: m1,
    promoted: true,
  },
  {
    id: 2,
    title: "Deluxe Pokhara Express",
    genre: "Tourist Bus / Long Route",
    rating: 4.8,
    votes: "8.7K",
    img: m2,
    promoted: true,
  },
  {
    id: 3,
    title: "Araniko Highway Express",
    genre: "Long Route / Mountain Highway",
    rating: 4.6,
    votes: "5.2K",
    img: m3,
  },
  {
    id: 4,
    title: "Everest Deluxe Night Coach",
    genre: "Night Bus / Premium Service",
    rating: 4.9,
    votes: "9.1K",
    img: m4,
  },
  {
    id: 5,
    title: "Lumbini Tourist Coach",
    genre: "AC Tourist / Intercity",
    rating: 4.7,
    votes: "6.4K",
    img: m5,
  },

  {
    id: 6,
    title: "Shine Nepal Yatayat",
    genre: "Deluxe / Kathmandu–Pokhara",
    rating: 4.8,
    votes: "4.1K",
    img: m6,
    languages: "Nepali, English",
    age: "All",
  },
  {
    id: 7,
    title: "Makalu Deluxe Bus Service",
    genre: "Super Deluxe / Kathmandu–Biratnagar",
    rating: 4.7,
    votes: "3.9K",
    img: m7,
    languages: "Nepali",
    age: "All",
  },
  {
    id: 8,
    title: "Greenline Tourist Coach",
    genre: "Tourist AC / Kathmandu–Chitwan",
    rating: 4.9,
    votes: "6.2K",
    img: m8,
    languages: "Nepali, English",
    age: "All",
  },
  {
    id: 9,
    title: "Himalayan Highway Express",
    genre: "Mountain Route / Dolakha–Kathmandu",
    rating: 4.6,
    votes: "2.3K",
    img: m9,
    languages: "Nepali",
    age: "All",
  },
  {
    id: 10,
    title: "Buddha Deluxe Night Coach",
    genre: "Night Bus / Kathmandu–Butwal",
    rating: 4.8,
    votes: "5.5K",
    img: m10,
    languages: "Nepali",
    age: "All",
  },


];


export const events = [
  {
    title: "COMEDY SHOWS",
    subtitle: "205+ Events",
    img: e1,
  },
  {
    title: "AMUSEMENT PARK",
    subtitle: "20+ Events",
    img: e2,
  },
  {
    title: "THEATRE SHOWS",
    subtitle: "80+ Events",
    img: e3,
  },
  {
    title: "KIDS",
    subtitle: "25+ Events",
    img: e4,
  },
  {
    title: "ADVENTURE & FUN",
    subtitle: "10+ Events",
    img: e5,
  },
];

export const theatres = [
  {
    name: "INOX Quest Mall, Ballygunge, Kolkata",
    distance: "2.0 km",
    cancellation: "Allows cancellation",
    img: inox,
    timings: [
      { time: "10:15 AM", label: "RECLINERS" },
      { time: "2:00 PM", label: "RECLINERS" },
      { time: "6:45 PM", label: "RECLINERS", highlight: true },
      { time: "11:35 PM", label: "RECLINERS" },
      { time: "7:45 PM", label: "RECLINERS" },
      { time: "12:35 PM", label: "RECLINERS" }
    ],
  },
  {
    name: "INOX Forum Mall, Elgin Road, Kolkata",
    distance: "3.3 km",
    cancellation: "Allows cancellation",
    img: inox,
    timings: [
      { time: "1:15 PM", label: "RECLINERS" },
      { time: "4:30 PM", label: "RECLINERS" },
    ],
  },
  {
    name: "PVR Manisquare, Manisqare Mall, Kolkata",
    distance: "1.5 km",
    cancellation: "Non-cancellable",
    img: pvr,
    timings: [
      { time: "10:30 AM", label: "PVR PXL" },
      { time: "1:45 PM", label: "PVR PXL" },
      { time: "5:15 PM", label: "PVR PXL" },
      { time: "11:25 PM", label: "PVR PXL", highlight: true },
    ],
  },
  {
    name: "INOX South City Mall, South City Mall, Kolkata",
    distance: "3.5 km",
    cancellation: "Allows cancellation",
    img: inox,
    timings: [
      { time: "12:00 PM", label: "LASER" },
      { time: "3:30 PM", label: "LASER" },
      { time: "6:50 PM", label: "LASER", highlight: true },
      { time: "11:25 PM", label: "LASER" },
    ],
  },
  {
    name: "Cinepolis Acropolis Mall, Rajdanga Road, Kolkata",
    distance: "1.8 km",
    cancellation: "Non-cancellable",
    img: cinepolis, // Make sure you have: `import cinepolis from "../assets/cinepolis.png"`
    timings: [
      { time: "08:10 PM", label: "DOLBY 7.1" },
      { time: "11:30 PM", label: "DOLBY 7.1" },
    ],
  },
];

export const ordersData = [
  {
    id: "TCAKJAB",
    title: "Sinners",
    format: "2D",
    datetime: "Tue, 29 Apr 2025 | 9:45 PM",
    cinema: "PVR: Mani Square Mall, Kolkata",
    quantity: 5,
    seats: "PE-P9,P10,P11,P12,P13",
    bookingTime: "Apr 29 2025 07:46PM",
    paymentMethod: "Credit/Debit Card",
    poster: m11,
    total: 607.10,
    ticket: 495.00,
    fee: 112.10
  },
  {
    id: "XYCKAJS",
    title: "Kesari Chapter 2: The Untold Story of Jallianwala Bagh",
    format: "2D",
    datetime: "Sat, 26 Apr 2025 | 2:45 PM",
    cinema: "Miraj Cinemas: Newtown, Kolkata",
    quantity: 3,
    seats: "PE-P9,P10,P11,P12,P13",
    bookingTime: "Apr 25 2025 04:00PM",
    paymentMethod: "Credit/Debit Card",
    poster: m12,
    total: 607.10,
    ticket: 495.00,
    fee: 112.10
  }
];

export const filters = ["2D", "3D", "Wheelchair Friendly", "Premium Seats", "Recliners", "IMAX", "PVR PXL", "4DX", "Laser", "Dolby Atmos"];

export const tabs = ["Profile", "Your Orders"];

export const countryCodes = [
  { name: "India", code: "IN", dial_code: "+91" },
  { name: "United States", code: "US", dial_code: "+1" },
  { name: "United Kingdom", code: "GB", dial_code: "+44" },
  { name: "Australia", code: "AU", dial_code: "+61" },
  { name: "Canada", code: "CA", dial_code: "+1" },
  { name: "Germany", code: "DE", dial_code: "+49" },
  { name: "France", code: "FR", dial_code: "+33" },
  { name: "Japan", code: "JP", dial_code: "+81" },
  { name: "China", code: "CN", dial_code: "+86" },
  { name: "Brazil", code: "BR", dial_code: "+55" },
  { name: "United Arab Emirates", code: "AE", dial_code: "+971" },
  { name: "Bangladesh", code: "BD", dial_code: "+880" },
  { name: "Nepal", code: "NP", dial_code: "+977" },
  { name: "Pakistan", code: "PK", dial_code: "+92" },
  { name: "Russia", code: "RU", dial_code: "+7" },
  { name: "South Africa", code: "ZA", dial_code: "+27" },
  { name: "Sri Lanka", code: "LK", dial_code: "+94" },
  { name: "Thailand", code: "TH", dial_code: "+66" },
  { name: "Indonesia", code: "ID", dial_code: "+62" },
  { name: "Malaysia", code: "MY", dial_code: "+60" },
  // Add more if needed
];
