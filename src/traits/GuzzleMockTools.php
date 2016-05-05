<?php
/**
 * Copyright (c) Padosoft.com 2016.
 */

namespace Padosoft\Test\traits;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Exception;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\TooManyRedirectsException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\TransferException;

trait GuzzleMockTools
{

    public function addResponse($status = 200,array $headers = [],$body = null,\GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new Response($status, $headers,$body));
    }

    public function addClientException($method, \GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new ClientException("Client error",new Request($method, 'test'),new Response(400, []),null,[]));
    }

    public function addServerException($method, \GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new ServerException("Server error", new Request($method, 'test')));
    }

    public function addBadResponseException($method, \GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new BadResponseException("Bad response error", new Request($method, 'test')));
    }

    public function addConnectException($method, \GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new ConnectException("Connect error", new Request($method, 'test')));
    }

    public function addTooManyRedirectsException($method, \GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new TooManyRedirectsException("Too many redirect error", new Request($method, 'test'),new Response(429, []),null,[]));
    }

    public function addRequestException($method, \GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new RequestException("Request error", new Request($method, 'test')));
    }

    public function addTransferException(\GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new TransferException("Transfer error", 666));
    }

    public function addRuntimeException(\GuzzleHttp\Handler\MockHandler $mock) {
        $mock->append(new \RuntimeException("Runtime error", 999));
    }


    public function addAllException($method, \GuzzleHttp\Handler\MockHandler $mock) {
         $this->addClientException($method, $mock);
         $this->addServerException($method, $mock);
         $this->addBadResponseException($method, $mock);
         $this->addConnectException($method, $mock);
         $this->addTooManyRedirectsException($method, $mock);
         $this->addRequestException($method, $mock);
         $this->addTransferException($mock);
         $this->addRuntimeException($mock);
    }

    public function createResponse($status = 200,array $headers = [],$body = null) {

        $mock = new MockHandler();
        $this->addResponse($status ,$headers ,$body , $mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createClientWithAllExceptionMock($method) {

        $mock = new MockHandler();
        $this->addAllException($method, $mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createClientExceptionMock($method) {

        $mock = new MockHandler();
        $this->addClientException($method, $mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createServerExceptionMock($method) {

        $mock = new MockHandler();
        $this->addServerException($method, $mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createBadResponseExceptionMock($method) {

        $mock = new MockHandler();
        $this->addBadResponseException($method, $mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createConnectExceptionMock($method) {

        $mock = new MockHandler();
        $this->addConnectException($method, $mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createTooManyRedirectsExceptionMock($method) {

        $mock = new MockHandler();
        $this->addTooManyRedirectsException($method, $mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createRequestExceptionMock($method) {

        $mock = new MockHandler();
        $this->addRequestException($method, $mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createTransferExceptionMock($method) {

        $mock = new MockHandler();
        $this->addTransferException($mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }

    public function createRuntimeExceptionnMock($method) {

        $mock = new MockHandler();
        $this->addRuntimeException($mock);
        $handler = HandlerStack::create($mock);
        return  new Client(['handler' => $handler]);

    }


}