import React from 'react'
import m5 from "../assets/m5.png";
import { languages } from '../utils/constants';

const bus = {
    id: 5,
    title: "Lumbini Tourist Coach",
    genre: "AC Tourist / Intercity",
    rating: 4.7,
    votes: "6.4K",
    img: m5,
    // Use available languages indices (0..2)
    languages: [languages[0], languages[1], languages[2]],
    format: ["2D", "3D", "IMAX 3D"],
    age: "2 years",
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
                <div className='absolute inset-0 bg-black/40' />
                
                {/* Actual Content */}
                <div className='relative z-10'>
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




                    
                    {/* Share Button */}
                    <div></div>
                </div>
            </div>
        </>
    )
}

export default BusDetails

