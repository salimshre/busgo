import React from 'react'
import m5 from "../assets/m5.png";

const bus = {
    id: 5,
    title: "Lumbini Tourist Coach",
    genre: "AC Tourist / Intercity",
    rating: 4.7,
    votes: "6.4K",
    img: m5,
  };

const BusDetails = () => {
    return (
        <>
            {/* BusDetails Section */}
            <div className='relative text-white font-sans px-4 py-10'
                style={{
                    backgroundImage: `url(bus.img)`,
                    backgroundSize: "cover",
                    backgroundPosition: "center",
                    backgroundRepeat: "no-repeat",
                }}
            >
                {/* Overlay for darkness */}
                <div></div>
                
                {/* Actual Content */}
                <div>
                    {/* Poster */}
                    <div></div>
                    
                    {/* Details */}
                    <div></div>
                    
                    {/* Share Button */}
                    <div></div>
                </div>
            </div>
        </>
    )
}

export default BusDetails

