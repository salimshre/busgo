import React from 'react';
import { languages, buses } from '../../utils/constants';
import BusCard from './BusCard';

const BusList = () => {
    return (
        <div className='w-full md:w-3/4 p-4'>
            <div className='flex flex-wrap gap-2 mb-4'>
                {
                    languages.map((lang) => (
                        <span key={lang} className='bg-white border border-gray-200 text-[#f74362] py-1 px-3 rounded-[24px] text-sm cursor-pointer hover:bg-gray-100'>
                            {lang}
                        </span>
                    ))
                }
            </div>

            <div className='flex justify-between items-center bg-white px-6 py-6 rounded mb-6'>
                <h3 className='font-semibold text-xl'>Coming Soon</h3>
                <a href="#" className='text-sm text-[#f74362] flex items-center gap-1'>
                    Explore Upcoming Buses <span className='ml-2'>&rarr;</span>
                </a>
            </div>

            <div className='flex flex-wrap gap-6'>
                {/*buses card*/}
                {
                    buses.map((bus) => (
                        <BusCard key={bus.id} bus={bus}/>
                    ))
                }
            </div>
        </div>
    )
}


export default BusList;

