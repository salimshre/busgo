import React from 'react'
import m5 from "../assets/m5.png";
import { languages } from '../utils/constants';

const bus = {
    id: 5,
    title: "Lumbini Tourist Coach",
    genre: ["music", "ac", "freezer"],
    rating: 4.7,
    votes: "6.4K",
    img: m5,
    // Use available languages indices (0..2)
    languages: [languages[0], languages[1], languages[2]],
    format: ["relax chair", "comfort", "ramro"],
    certification: "U", // Universal
    duration: "8h 30m",
    releaseDate: "12th Aug, 2023",
    description: "Experience the ultimate comfort and convenience with Lumbini Tourist Coach. Our state-of-the-art buses are designed to provide a relaxing journey, equipped with modern amenities such as reclining seats, air conditioning, and onboard entertainment. Whether you're traveling for leisure or business, our professional staff ensures a safe and enjoyable ride. Discover the beauty of your destination while enjoying top-notch service and comfort on every trip with Lumbini Tourist Coach.",
  };

const BusDetails = () => {
    return (
        <>
            {/* BusDetails Section */}
            <div
                className='relative text-white font-sans px-4 py-10'
                style={{
                    backgroundImage: `url(${bus.img})`,
                    backgroundSize: "cover",
                    backgroundPosition: "center",
                    backgroundRepeat: "no-repeat",
                }}
            >
                {/* Overlay for darkness */}
                <div className='absolute inset-0 bg-black opacity-70' />
                
                {/* Actual Content */}
                <div className='relative z-10 max-w-7xl mx-auto flex flex-col'>
                    {/* Poster */}
                    <div>
                        <img src={bus.img} alt={bus.title} className='rounded-xl w-52 shadow-xl' />                       
                    </div>
                    
                    {/* Details */}
                    <div className="flex flex-col justify-start flex-1">
                        <h1 className="text-4xl font-bold mb-4">{bus.title}</h1>

                        <div className="flex items-center gap-4 mb-3">
                            <div className="bg-[#3a3a3a] px-4 py-2 rounded-md flex items-center gap-2 text-sm">
                                <span className="text-pink-500 font-bold">
                                    &#9733; {bus.rating}
                                </span>
                                <span className="text-gray-300">
                                    {bus.votes} Votes
                                </span>
                                <button className="cursor-pointer bg-[#2f2f2f] ml-6 px-4 py-2 rounded-md hover:bg-[#4a4a4a]">
                                    Rate now
                                </button>
                            </div>
                        </div>
                    </div>

                               
                    <div className="flex items-center gap-3 text-sm mb-4">
                        <span className="bg-[#3a3a3a] px-3 py-1 rounded">
                            {bus.format?.join(", ")}
                        </span>
                        <span className="bg-[#3a3a3a] px-3 py-1 rounded">
                            {bus.languages?.join(", ")}
                        </span>
                    </div>

                    <p className="text-sm  ■ text-gray-300 mb-4">
                        {bus.duration} • {bus.genre.join(", ")} •{" "}
                        {bus.certification} •{" "}
                        {bus.releaseDate}
                    </p>


                    <div>
                        <h2 className="text-xl font-bold mb-2">About the bus</h2>
                        <p className="text-sm ■text-gray-300 leading-relaxed mb-4">
                            {bus.description}
                        </p>
                    </div>

                    
                    {/* Share Button */}
                    <div className="absolute top-0 right-0 cursor-pointer">
                        <button className="cursor-pointer [bg-[#3a3a3a] px-4 py-2 rounded text-sm flex items-center gap-2"> 
                            
                        <svg className="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18 16.08c-.76 0-1.44.3-1.96.771-7.13-4.21c.05-.25.09-.51.09-.78s-.03-.53-.09-.7817.04-4.15c.54.5 1.25.81 2.05.81 1.66 0 3-1.34
                            3-3519.66 2 18 2s-3 1.34-3 3c0 .27.04.52.09.7817.91 9.93C7.38 9.43 6.
                            67 9.12 5.87 9.12 4.21 9.12 2.87 10.46 2.87 12.12s1.34 3 3 3c.8 0 1.
                            51-.31 2.04-.8117.13 4.21c-.06.24-.1.49-.1.75 0 1.66 1.34 3 3 353-1.34
                            3-3-1.34-3-3-32" />
                        </svg>
                            Share
                        </button>
                    </div>
                </div>
            </div>
        </>
    )
}

export default BusDetails

