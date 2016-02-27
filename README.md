# WebTech-Assnment1
Repo to promote better group cohesive coding for our assignment

The	 assignment	 1	 is	 focused	 on	 developing	 skills	 that	 can	 be	 regarded	 as	 valuable	 in	 the	
development	of	student	competences	in	skills	needed	for	common	web	system	tasks	in	use	
today.	The	assignment	is	ordered	by	difficulty	and	should	be	adequate	to	evaluate	students’
ability	to	put	the	concepts	and	technologies	covered	to	use	to	solve	the	problems	described	
in	the	assignment.
The	assignment	is	to	be	conducted	in	groups	between	2	and	5	persons.	The	grade	rubric	is	
provided	as	an	indication	of	how	much	work	is	required	for	the	various	tasks.	Even	if	tasks	are	
assigned	to	different	group	members,	it	is	important	for	all	members	to	be familiar	with	how	
to	accomplish	all	aspects	of	the	assignment.
Task	A
The	analysis	of	text	is	an	important	consideration	for	businesses,	especially	when	considering	
how	 to	 analyze and	 making	 informed	 decisions	 from	 customer	 feedback,	 comments	 or	
complaints	 made	 about	 the	 product	 and/or	 services	 provided.	 The	 first	 tasks	 of	 this	
assignment	is	focused	on	analyzing passage	of	text	which	can	be	supplied	to	both	a	PHP	and	
a	JS	program.
Details:
Write	a	program	in	PHP	and	a	program	in	JS	that	will	complete	the	following:
1. Read	into	the	program	a	passage	of	text.	Text	should	be	entered	directly	using	an	
HTML	text	area for	the	JS	program	and	should	be	read	from	a	file	in	the	PHP	program.
2. The	programs	will	generate	a	listing	of	unique	words	(ignoring	case)	and	its	frequency	
that	occurred within	the	program.
3. The	results	of	this	information	should	be	stored	in	an	array	(in	PHP)	or	an	object	literal	
(JS)
4. The	program	will	ignore	common	words	such	as:
a. The
b. It
c. His
d. Her
e. A
f. Be
g. I
h. In
i. Not
j. There
k. Is
l. Are
m. Was
n. Were
o. This
p. That
q. And
r. Has
s. Had
t. To
u. You
v. Me
w. At
x. So
5. This	information	will	be	displayed	in	an	HTML	form	for	example:
Word Score
Funny 1
Silly 3
Naïve 3
Stupid 3
Bomb 1
Grade 1
6. The	JS	program	will	dynamically	add	the	table	to	the	page,	while	the	PHP	will	echo	the
resulting	table	as	HTML.
7. The	program	will	also	create	some	statistics	about	the	passage	provided:
a. The	median	word(s):
i. The	median	of	a	set	of	numbers	(not	necessarily	distinct),	is	obtained	
by	 arranging	 the	 numbers	 in	 order,	 and	 taking	 the	 number	 in	 the	
middle.	If	n	is	odd,	there	is	a	unique	middle	number.	If	n	is	even,	then	
the	 average	 of	 the	 two	 middle	 values	 is	 the	 median (obviously	 this	
should	be	adjusted	for words).
b. The	mode	word:
i. The	 mode	 of	 a	 set	 of	 words	 (not	 necessarily	 distinct),	 is	 the	 word	
appearing	most	often
c. Calculate	the	mean	value	from	the	frequency	of	terms:
i. A	simple	calculation	of	the	average	using	the	frequencies	generated
from	the	file.
d. The	Standard	Deviation for	the	paragraph of	text
i. The	standard deviation is	the	square root	of	the	variance,	while	the	
variance	is	the	squared	difference	of	each	frequency	from	the	mean.
8. The	results	of	the	mean,	mode,	median	and	standard	deviation	should	be	displayed	in	
a	separate	table.
Task	B
Processing	the	data	is	an	important	consideration,	however	we	should	be	able	to	persist	this	
information	through	the	use	of	databases.	
Details:
Using	 with	 the	 MySQLi	 class or	 the	 DatabaseAdapter	 class	 provided and	 the PHP
implementation of	 Task	 A, store	 the	 words	 and	 their	 frequencies	 to	 a	 database.	 If	 the	
program	is	run	multiple	times,	the	values	of	the	word	frequency	is updated	by	adding	the	new	
value	with	the	value	existing	in	the	database.	If	the	word	was	never	encountered,	it (and	the	
associated	frequency) is	then	added	to	the	database.
Some additional	details:
1. The	database	should be	called	frequencycounter
2. The	 table	 should	 be	 called	 word	 frequency,	 and	 contain	 three	 columns	 (id,	 word,	
frequency)
Task	C
Processing	and	storing	the	data	is	not	truly beneficial	to	the	business	unless	that	information	
can	be	presented	in	a	form	that	allows	actionable	decisions.	In	this	section	we	will	use	JS	to	
produce	useful	graphical	reports	for	the	data	provided.
Details
Using	either	the	JS	implementation	in	Task	A	or	extending	the	implementation	in	Task	C,	
produce	 the	 following	 graphs	 based	 on	 the	 word-frequency results	 generated	 from	 the	
analysis:
1. Pie	chart	(of	all	the	words)
2. Bar	chart	/	Histogram	of	the	word	and	their respective	frequency
You	should	use	the	Highcharts	JS library	to	visualize	the	results	from	the	analysis.	You	are	free	
to	choose	whether	the	visualizations	should	be	on	the	same	page	at	the	same	time,	or	if	the	
user	can	select	an	option	to	choose	which	chart	should	be	displayed.
