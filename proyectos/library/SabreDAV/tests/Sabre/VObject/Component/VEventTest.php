<?php

class Sabre_VObject_Component_VEventTest extends PHPUnit_Framework_TestCase {

    /**
     * @dataProvider timeRangeTestData
     */
    public function testInTimeRange(Sabre_VObject_Component_VEvent $vevent,$start,$end,$outcome) {

        $this->assertEquals($outcome, $vevent->isInTimeRange($start, $end));

    }

    public function timeRangeTestData() {

        $tests = array();

        $vevent = new Sabre_VObject_Component_VEvent('VEVENT');
        $vevent->DTSTART = '20111223T120000Z';
        $tests[] = array($vevent, new DateTime('2011-01-01'), new DateTime('2012-01-01'), true);
        $tests[] = array($vevent, new DateTime('2011-01-01'), new DateTime('2011-11-01'), false);

        $vevent2 = clone $vevent;
        $vevent2->DTEND = '20111225T120000Z';
        $tests[] = array($vevent2, new DateTime('2011-01-01'), new DateTime('2012-01-01'), true);
        $tests[] = array($vevent2, new DateTime('2011-01-01'), new DateTime('2011-11-01'), false);

        $vevent3 = clone $vevent;
        $vevent3->DURATION = 'P1D';
        $tests[] = array($vevent3, new DateTime('2011-01-01'), new DateTime('2012-01-01'), true);
        $tests[] = array($vevent3, new DateTime('2011-01-01'), new DateTime('2011-11-01'), false);

        $vevent4 = clone $vevent;
        $vevent4->DTSTART = '20111225';
        $vevent4->DTSTART['VALUE'] = 'DATE';
        $tests[] = array($vevent4, new DateTime('2011-01-01'), new DateTime('2012-01-01'), true);
        $tests[] = array($vevent4, new DateTime('2011-01-01'), new DateTime('2011-11-01'), false);
        // Event with no end date should be treated as lasting the entire day.
        $tests[] = array($vevent4, new DateTime('2011-12-25 16:00:00'), new DateTime('2011-12-25 17:00:00'), true);


        $vevent5 = clone $vevent;
        $vevent5->DURATION = 'P1D';
        $vevent5->RRULE = 'FREQ=YEARLY';
        $tests[] = array($vevent5, new DateTime('2011-01-01'), new DateTime('2012-01-01'), true);
        $tests[] = array($vevent5, new DateTime('2011-01-01'), new DateTime('2011-11-01'), false);
        $tests[] = array($vevent5, new DateTime('2013-12-01'), new DateTime('2013-12-31'), true);

        $vevent6 = clone $vevent;
        $vevent6->DTSTART = '20111225';
        $vevent6->DTSTART['VALUE'] = 'DATE';
        $vevent6->DTEND   = '20111225';
        $vevent7->DTEND['VALUE'] = 'DATE';
        $tests[] = array($vevent6, new DateTime('2011-01-01'), new DateTime('2012-01-01'), true);
        $tests[] = array($vevent6, new DateTime('2011-01-01'), new DateTime('2011-11-01'), false);
        // Event with no end date should be treated as lasting the entire day.
        $tests[] = array($vevent6, new DateTime('2011-12-25 16:00:00'), new DateTime('2011-12-25 17:00:00'), true);

        return $tests;

    }

}

