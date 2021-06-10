 select 
	busNumber as 'Bus Number',
	station as 'Station',
    Time(pickup - Time(p2)) as 'Total Travel Time',
	subtime(lead(pickup)
		over (partition by busNumber),  time(pickup)) 
		as 'Time to Next Station'
from
	busStops cross join
    (select
		pickup as p2
	from
		busStops
	limit 1) as pickUp1st;