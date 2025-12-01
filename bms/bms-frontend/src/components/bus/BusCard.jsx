import React from 'react'

const BusCard = ({ bus }) => {
    return (
        <div className='w-40 md:w-52 cursor-pointer bg-white rounded shadow'>
            <img src={bus.img} alt={bus.title} className='rounded-t-lg w-full h-36 object-cover' />
            <div className='p-3'>
                <p className='mt-0 font-semibold'>{bus.title}</p>
                <p className='text-xs text-gray-500'>{bus.rating} | {bus.votes}</p>
                <p className='text-sm text-gray-600 mt-1 truncate'>{bus.genre}</p>
            </div>
        </div>
    )
}

export default BusCard