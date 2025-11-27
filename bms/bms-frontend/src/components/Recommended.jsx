import React from 'react';
import { buses } from '../utils/constants';

const Recommended = () => {
  return (
    <div className='w-full py-6 bg-white'>
      <div className='max-w-screen-xl mx-auto px-4'>
        <div className='items-center flex justify-between mb-4'>
          <h2 className='text-2xl font-semibold'>
            Recommended Buses for You
          </h2>
          <span className='text-md text-red-500 cursor-pointer hover:underline font-medium'>
            See All
          </span>
        </div>

        <div className='grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4'>
          {buses.map((bus, i) => (
            <div key={i} className='rounded overflow-hidden cursor-pointer'>
              <div className='relative'>
                <img
                  src={bus.img}
                  alt={bus.title}
                  className='w-full h-[300px] object-cover rounded'
                />
              </div>

              <div className='bg-black text-white text-sm px-2 py-1 flex items-center justify-between'>
                <span>⭐ {bus.rating}/10</span>
                <span>{bus.votes} Votes</span>
              </div>

              <div className='px-2 py-1'>
                <h3 className='font-semibold text-lg'>{bus.title}</h3>
                <p className='text-md text-gray-500'>
                  {bus.genre.replaceAll ? bus.genre.replaceAll('/', ', ') : bus.genre.replace(/\//g, ', ')}
                </p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Recommended;
